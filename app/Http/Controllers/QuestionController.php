<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Imports\QuestionImport;
use App\Models\Exam;
use App\Models\Question;
use App\Models\QuestionDetail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QuestionController extends Controller
{
    public function index()
    {
        $question = Exam::all();
        return view("admin.layout.question",[
            "title"=> "Question",
            "data"=> $question
        ]);
    }

    public function create($id)
    {
        $exam = Exam::find($id);
        return view("admin.layout.add-question",[
            "title"=> "Tambah Soal",
            "data"=> $exam
        ]);
    }

    public function store(QuestionRequest $request)
    {

        $option = $request->content_answer;
        $question = Question::create([
            "exam_id"=> $request->exam_id,
            "question"=> $request->question,
        ]);

        foreach($option as $key => $value){
            $is_correct = false;
            if($key == $request->is_correct){
                $is_correct = true;
            }
            $option[$key] = $value;
             QuestionDetail::create([
                "question_id"=> $question->id,
                "content_answer"=> $option[$key],
                "correct_answer"=> $is_correct
             ]);
        }

       return redirect()->route("viewQuestion")->with("success","Data Soal berhasil ditambahkan");
    }
    
    public function storeWithImport(Request $request)
    {
        $question = new QuestionImport();
        $question->setExam( $request->exam_id );
        $path = $request->file("excel")->path();

       Excel::import($question, $path);
       return redirect('/admin/question')->with('success', 'Data berhasil di Import');
    }

    public function preview(Request $request)
    {
    //    $a = Excel::import(new QuestionImport, 'questions.xlsx');
    $question = Excel::toArray(new QuestionImport, $request->file('excel')->path());
        $result = array_map(function ($item)  {
            $data = [];
                for( $j = 1; $j < (count($item)-1); $j++){
                    $data[$j] = $item[$j];
                }
            return [
                'question'=> $item[0],
                'opsi'=> $data,
                'jawaban'=> $item[count($item)-1],
            ];
            
        },$question[0]);


    //    dd($a);
    //    return redirect('/')->with('success', 'All good!');
         return response()->json($result);

    }
}
