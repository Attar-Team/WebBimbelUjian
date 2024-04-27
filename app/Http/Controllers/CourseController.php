<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankQuestionRequest;
use App\Http\Requests\VideoCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        if($request->hasFile('file')){
            $fileName = $request->file('file')->store('uploads/bank_question', 'public');
        }
        
        // if ($image = $request->file('file')){
        //     $fileName = $request->name.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        //     $image->move('uploads/bank_question', $fileName);
        // }

        Course::create([
            "name"=> $request->name,
            "content"=> $request->content,
            "url"=> $fileName,
            "type"=> "file pdf"
        ]);

        return redirect()->route("course.show")->with("success","Data berhasil ditambahkan");
    }

    public function edit($id)
    {
        return view('admin.layout.update-course',[
            'title'=> 'Edit Kursus',
            'data' => Course::find($id)
        ]);
    }

    public function updateVideo(VideoCourseRequest $request, $id)
    {
        parse_str(parse_url($request->url_video, PHP_URL_QUERY), $query);

        $youtubeCode = $query['v'];
        $course = Course::find($id);
        $course->name = $request->name;
        $course->content = $request->content;
        $course->url = $youtubeCode;
        $course->save();

        return redirect()->route('course.show')->with('success','Data Berhasil Di Update');
    }

    public function updateBankQuestion(Request $request, $id)
    {
        $request->validate([
            "name"=> "required",
            "file"=> "mimes:pdf,doc,docx",
            "file_asli"=> "required",
            "content"=> "required",
        ]);
        $path = '';
        if($request->hasFile('file') != ''){
            File::delete("storage/$request->file_asli");
            $file = $request->file('file');      
            $path = $file->store('uploads/bank_question', 'public');
        }else{
            $path = $request->file_asli;
        }

        $course = Course::find($id);
        $course->name = $request->name;
        $course->content = $request->content;
        $course->url = $path;
        $course->save();

        return redirect()->route('course.show')->with('success','Data Berhasil Di Update');
    }
}
