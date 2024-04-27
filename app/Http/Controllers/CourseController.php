<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankQuestionRequest;
use App\Http\Requests\VideoCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view("admin.layout.course", [
            "title"=> "Kursus",
            "data"=> $courses
        ]);
    }

    public function create()
    {
        return view("admin.layout.add-course",[
            "title"=> "Tambah Kursus"
        ]);
    }

    public function storeVideo(VideoCourseRequest $request)
    {
        parse_str(parse_url($request->url_video, PHP_URL_QUERY), $query);

        $youtubeCode = $query['v'];
 
        Course::create([
            "name"=> $request->name,
            "content"=> $request->content,
            "url"=> $youtubeCode,
            "type"=> "videos"
        ]);

        return redirect()->route("course.show")->with("success","Data Berhasil ditambahkan");
    }

    public function storeBankQuestion(BankQuestionRequest $request)
    {
        $fileName = '';
        if ($image = $request->file('file')){
            $fileName = $request->name.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/bank_question', $fileName);
        }

        Course::create([
            "name"=> $request->name,
            "content"=> $request->content,
            "url"=> $fileName,
            "type"=> "file pdf"
        ]);

        return redirect()->route("course.show")->with("success","Data berhasil ditambahkan");
    }
}
