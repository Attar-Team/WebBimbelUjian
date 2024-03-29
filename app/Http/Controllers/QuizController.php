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
        // dd(Session::get("answerId"));
        //ambil data dari session yang sudah dibuat pada saat start ujian
        $question = Session::get("questions");

        // mengecek apakah sudah ada jawaban nya
        $checkAnswerAll = Question::join('answer_details','questions.id','=','answer_details.id')->get();

        // mengambil detail soal berdasarkan nomor soal
        $detailQuestion = $question->where("nomor_soal",$number_question)->first();
        $questionId = $detailQuestion->id;

        //mengambil detail opsi berdasarkkan id soal
        $optionAnswer = QuestionDetail::where('question_id',$questionId)->get();

        return view("quiz.index",[
            "question"=> $question,
            "detailQuestion"=> $detailQuestion,
            "optionQuestion"=> $optionAnswer,
            "checkAnswerAll"=> $checkAnswerAll
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
        if($questionDetail->is_correct === 1){
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
}
