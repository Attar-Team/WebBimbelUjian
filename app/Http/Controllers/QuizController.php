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
        return view("quiz.start");
    }

    public function submitStart($exam_id)
    {

        //menambahkan data ke tabel jawaban
        $answer = Answer::create([
            "exam_id"=> $exam_id,
            // "user_id"=> Auth::user()->id,
            "user_id"=> 1,
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
        Session::put('startId', true);
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
}
