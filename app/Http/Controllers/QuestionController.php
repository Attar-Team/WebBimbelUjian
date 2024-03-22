<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

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
}
