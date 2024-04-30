<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Package;
use App\Models\PackageDetail;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        return view("admin.layout.package",[
            "title"=> "Paket",
            "data"=> Package::all()
        ]);
    }

    public function create()
    {
        $exam = Exam::all();
        $course = Course::all();
        return view("admin.layout.add-package",[
            "title"=> "Tambah Paket",
            "exam"=> $exam,
            "course"=> $course
            ]);
    }

    public function store(PackageRequest $request)
    {
        $fileName = '';
        if($request->hasFile('file')){
            $fileName = $request->file('file')->store('uploads/bank_question', 'public');
        }
        $package = Package::create([
            "name"=> $request->name,
            "type"=> $request->type,
            "category"=> $request->category,
            "price"=> $request->price,
            "discount"=> $request->discount,
            "photo"=> $fileName,
        ]);

        foreach($request->question as $key => $value){
            foreach($request->is_review as $review){
                $is_review = false;
                if($review == $value){
                    $is_review = true;
                }
            }
            PackageDetail::create([
                "package_id"=> $package->id,
                "exam_id"=> $value,
                "is_review"=> $is_review,
                "amount_acces"=> $request->acces[$key],
            ]);
        }
        foreach($request->video as $key => $value){
            PackageDetail::create([
                "package_id"=> $package->id,
                "course_id"=> $value,
            ]);
        }
        foreach($request->pdf as $key => $value){
            PackageDetail::create([
                "package_id"=> $package->id,
                "course_id"=> $value,
            ]);
        }
        return redirect()->route("package.show")->with("success","Data berhasil ditambahkan");
    }
}
