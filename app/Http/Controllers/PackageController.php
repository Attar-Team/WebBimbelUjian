<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Package;
use App\Models\PackageDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            $fileName = $request->file('file')->store('uploads/foto_paket', 'public');
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

    public function edit($id)
    {
        $package = Package::find($id);
        $course = Course::all();
        $exam = Exam::all();

        $setting = [];

        $idExam = [];
        $idCourse = [];

        foreach($package->packageDetail as $value){
            if($value->exam_id != null){
                array_push($setting, [
                    "id"=> $value->exam_id,
                   "amount_acces" => $value->amount_acces,
                   "is_review"=> $value->is_review,
                ]);
                array_push($idExam, $value->exam_id);
            }else{
                array_push($idCourse, $value->course_id);
            }
        }

        return view('admin.layout.update-package',[
            'title'=> "Edit Paket",
            "package"=> $package,
            "exam"=> $exam,
            "course"=> $course,
            "idExam"=> $idExam,
            "idCourse"=> $idCourse,
            "setting"=> $setting,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name"=> "required",
            "category"=> "required",
            "type"=> "required|string",
            "price"=> "required",
            "discount"=> "required",
            "file"=> 'mimes:jpg,bmp,png',
            "file_asli"=> "required",
            "is_review"=> "array",
            "access"=> "array",
            "question"=> "array",
            "video"=> "array",
            "pdf"=> "array",
        ]);
        $packageDetail = PackageDetail::where("package_id", $id);
        $packageDetail->delete();

        $path = "";
        if($request->hasFile('file') != ''){
            File::delete("storage/$request->file_asli");
            $file = $request->file('file');      
            $path = $file->store('uploads/foto_paket', 'public');
        }else{
            $path = $request->file_asli;
        }

        $package = Package::find($id);
        $package->name = $request->name;
        $package->type = $request->type;
        $package->category = $request->category;
        $package->price = str_replace('.', '', $request->price) ;
        $package->photo = $path;
        $package->discount = str_replace('.', '', $request->discount) ;
        $package->save();

        foreach($request->question as $key => $value){
            $is_review = false;
            foreach($request->is_review as $review){
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
                "package_id"=> $id,
                "course_id"=> $value,
            ]);
        }
        foreach($request->pdf as $key => $value){
            PackageDetail::create([
                "package_id"=> $id,
                "course_id"=> $value,
            ]);
        }
        return redirect()->route("package.show")->with("success","Data berhasil di update");
    }
}
