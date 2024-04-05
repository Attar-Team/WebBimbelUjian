<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AnswerDetail;
use App\Models\Question;
use App\Models\QuestionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function index($number_question)
    {
        $doubtfulAnswer = [];
        $doneAnswer = [];
        $answer_id = Session::get("answerId");
        //ambil data dari session yang sudah dibuat pada saat start ujian
        $question = Session::get("questions");
        // mengecek apakah sudah ada jawaban nya
        $checkAnswerAll = Question::join('answer_details','questions.id','=','answer_details.id')->get();
        // mengambil detail soal berdasarkan nomor soal
        $detailQuestion = $question->where("nomor_soal",$number_question)->first();
        $questionId = $detailQuestion->id;
        //mengambil detail opsi berdasarkkan id soal
        $optionAnswer = QuestionDetail::where('question_id',$questionId)->get();
        //mengambil data dari detail jawab untuk mengecek aktif radio button
        $answer = AnswerDetail::where("question_id",$questionId)
        ->where('answer_id', $answer_id)->first();
        //mengambil semua data answer
        $answerDetail = AnswerDetail::where("answer_id",$answer_id)->get();
        //menentukan warna untuk ragu ragu dan sudah terjawab
            foreach($question as $key => $item){
                foreach($answerDetail as $a){
                    $questionAnswerId = $a->question_id ?? 0;
                    if($item->id == $questionAnswerId){
                        if($a->question_detail_id != null)
                        array_push($doneAnswer, $item->nomor_soal);
                        if($a->is_doubtful == 1)
                        array_push($doubtfulAnswer, $item->nomor_soal);

                    }
                }
            }

        //mengambil waktu ujian dan berapa lama
        $getTimeStart = Answer::find($answer_id);
        
        $timeStart = $getTimeStart->start_date;
        $duration = $getTimeStart->Exam->duration;

        //menambahkan durasi
        $date=date_create($timeStart);
        date_add($date,date_interval_create_from_date_string("$duration minutes"));
        // menampikan format ($date,"Y-m-d");
        $endTimeExam = date_format($date,"F j, Y H:i:s");


        return view("quiz.index",[
            "question"=> $question,
            "detailQuestion"=> $detailQuestion,
            "optionQuestion"=> $optionAnswer,
            "checkAnswerAll"=> $checkAnswerAll,
            "answer" => $answer,
            "doubtfulAnswer" => $doubtfulAnswer,
            "doneAnswer" => $doneAnswer,
            "endTimeExam"=> $endTimeExam
        ]);
    }

    public function start($exam_id)
    {
        // $answer = Answer::where("exam_id", $exam_id)
        // ->where('user_id', Auth::user()->id)->get();

        $answer = Answer::where("exam_id", $exam_id)
        ->where('user_id', 2)->get();

        return view("quiz.start",[
            "data"=> $answer,
        ]);
    }

    public function review($id)
    {
        $questionDetail = AnswerDetail::with('question')
        ->with('questionDetail_questionId')
        ->where('answer_id',$id)
        ->orderBy('number_question','asc')->get();

        return view("quiz.review",[
            "questionDetail"=> $questionDetail
        ]);
    }

    public function submitStart($exam_id)
    {

        //menambahkan data ke tabel jawaban
        $answer = Answer::create([
            "exam_id"=> $exam_id,
            // "user_id"=> Auth::user()->id,
            "user_id"=> 2,
            "status"=> "not finished",
            "start_date"=> now()
        ]);

        //mengambil data soal
        $question = Question::select('questions.id','questions.question','questions.photo','is_correct','is_doubtful','questions.exam_id')
        ->leftJoin('answer_details','questions.id','=','answer_details.id')->where('questions.exam_id','=',$exam_id)->inRandomOrder()->get();

        $question = $question->map(function ($item,$test) {
            $item->nomor_soal = $test+=1;
            return $item;
        });

        Session::put('answerId', $answer->id);
        Session::put('is_start', true);
        Session::put('questions',$question);
        return redirect('/quiz/1');
    }

    
    public function apiAnswer(Request $request)
    {
        //mengambil status benar opsi jawaban 
        $questionDetail = QuestionDetail::find($request->question_detail_id);
        //mengambil data detail jawaban berdasarkan id soal dan id jawaban
        $check = AnswerDetail::where("question_id","=",$request->question_id)
        ->where("answer_id","=",$request->answer_id)
        ->get();


        //mengecek jawaban benar atau salah
        $boolCorrect = false;
        if($questionDetail->correct_answer === 1){
            $boolCorrect = true;
        }

        //mengecek sudah ada jawaban apa belum
        if(count($check) == 0){
            AnswerDetail::create([
                'answer_id' => $request->answer_id,
                'question_id'=> $request->question_id,
                'question_detail_id'=> $request->question_detail_id,
                'number_question'=> $request->number_question,
                'is_correct'=> $boolCorrect,
                'is_doubtful'=> false,
            ]);
            $data = [
                'message'=> "data berhasil ditambahkan"
            ];
        }else{
            $detailAnswerId = $check[0]->id;
            $detailAnswer = AnswerDetail::find($detailAnswerId);
            $detailAnswer->answer_id = $request->answer_id;
            $detailAnswer->question_id = $request->question_id;
            $detailAnswer->question_detail_id = $request->question_detail_id;
            $detailAnswer->number_question = $request->number_question;
            $detailAnswer->is_correct = $boolCorrect;
            $detailAnswer->save();
            $data = [
                'message'=> "data berhasil di update"
            ];
        }
        return response()->json($data);
    }

    public function apiDoubtful(Request $request)
    {
        //mengambil data dari tabel detail soal berdsarkan id;
        $answerDetail = AnswerDetail::where('question_id','=', $request->question_id)
        ->where("answer_id","=",$request->answer_id)->get();

        //mengecek apakah sudah menjawab apa belom
        //jika belum maka lakukan tambah data ke dalan answer detail
        if(count($answerDetail) == 0){
            AnswerDetail::create([
                'answer_id' => $request->answer_id,
                'question_id'=> $request->question_id,
                'is_doubtful'=> false,
            ]);
        }

        $checkDoubtful = AnswerDetail::select('is_doubtful')->where('question_id','=', $request->question_id)
        ->where("answer_id","=",$request->answer_id)->first();


        if($checkDoubtful->is_doubtful == 0){
            $detailAnswer = AnswerDetail::where('question_id','=',$request->question_id)
            ->where('answer_id',$request->answer_id)->first();
            $detailAnswer->is_doubtful = true;
            $detailAnswer->save();
            $data = [
                'message'=> "data berhasil menjadi true"
            ];
        }else{
            $detailAnswer = AnswerDetail::where('question_id','=',$request->question_id)
            ->where('answer_id',$request->answer_id)->first();
            $detailAnswer->is_doubtful = false;
            $detailAnswer->save();
            $data = [
                'message'=> "data berhasil menjadi false"
            ];
        }

        return response()->json($data);
    }

    public function confirm()
    {
        $finalDoneAnswer = [];
        $doneAnswer = [];
        $answer_id = Session::get("answerId");

        $question = Session::get("questions");

        $answerDetail = AnswerDetail::with('question')->with('question_details')->where("answer_id",$answer_id)->get();

        foreach($question as $key => $item){
            foreach($answerDetail as $a){

                $questionAnswerId = $a->question_id ?? 0;

                if($item->id == $questionAnswerId){

                    if($a->question_detail_id == null){
                        array_push($doneAnswer, [
                            "question_id"=> $item->question_id,
                            "nomor_soal"=> $item->nomor_soal,
                            "question"=> $a->question->question,
                            "content_answer"=> "",
                        ]);
                    }
                    if($a->question_detail_id != null)
                    array_push($doneAnswer, [
                        "question_id"=> $item->question_id,
                        "nomor_soal"=> $item->nomor_soal,
                        "question"=> $a->question->question,
                        "content_answer"=> $a->question_details->content_answer,
                    ]);
                }

            }
        }

            foreach($question as $key => $item){
                foreach($doneAnswer as $k => $d){
                    $content_answer = AnswerDetail::with('question_details')->where('question_id',$item->id)->where('answer_id',$answer_id)->get();
                    $answer = $content_answer[0]->question_details->content_answer ?? "";
                    $is_doubtful = $content_answer[0]->is_doubtful ?? 0;
                               if( !in_array($item->id, $d)){
                                array_push($finalDoneAnswer, [
                                    "nomor_soal"=> $item->nomor_soal,
                                    "question"=> $item->question,
                                    "is_doubtful"=> $is_doubtful,
                                    "content_answer"=> $answer,
                                ]);
                                break;
                }
            }
        }

        return view("quiz.confirm",[
            "data"=> $finalDoneAnswer,
        ]);
    } 
    public function submitFinish()
    {
        $finalDoneAnswer = [];
        $answer_id = Session::get("answerId");

        $question = Session::get("questions");

        $answerDetail = AnswerDetail::with('question')->with('question_details')->where("answer_id",$answer_id)->get();
        
        //mencari examid 
        $exam = Answer::find($answer_id);

        foreach($question as $key => $item){
            foreach($answerDetail->toArray() as $k => $d){
                $content_answer = AnswerDetail::with('question_details')->where('question_id',$item->id)->where('answer_id',$answer_id)->get();
                
                $answer = $content_answer[0]->question_details->content_answer ?? "";
                $is_doubtful = $content_answer[0]->is_doubtful ?? 0;
                           if( $answer == "" && count($content_answer) == 0){
                            array_push($finalDoneAnswer, [
                                "answer_id"=> $answer_id,
                                "question_id"=> $item->id,
                                "number_question"=> $item->nomor_soal,
                                "is_doubtful"=> $is_doubtful,
                                "is_correct"=> 0
                            ]);
                            break;
            }
        }
    }


    //menambahkan data yang belum terjawab
    AnswerDetail::insert($finalDoneAnswer);

    $correctAnswer = AnswerDetail::where('answer_id', $answer_id)
    ->where('is_correct',1)->get();

    $answer = Answer::find( $answer_id );
    $amountQuestion = $answer->Exam->amount_question;

    $grade = count($correctAnswer) * 100 / $amountQuestion;
    
    //update field status menjadi finis
    $updateAnswer = Answer::find($answer_id);
    $updateAnswer->status = "finished";
    $updateAnswer->grade = $grade;
    $updateAnswer->save();

    //menghapus session
    Session::forget('answerId');
    Session::forget('is_start');
    Session::forget('questions');

    return redirect("/quiz/$exam->exam_id/start");
    }

    
}
