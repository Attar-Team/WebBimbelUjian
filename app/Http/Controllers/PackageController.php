<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Package;
use App\Models\PackageDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Concerns\ToArray;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all(); 
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

    public function show($id)
    {
        $package = Package::find($id);
        $course = PackageDetail::join("courses","package_details.course_id","=","courses.id")
        ->where('package_id', $id)->get();
        
        return view("admin.layout.show-package",[
            "title"=> "Detail Paket",
            "package"=> $package,
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
            "description"=> $request->description,
            "category"=> $request->category,
            "price"=> str_replace('.', '', $request->price),
            "discount"=> str_replace('.', '', $request->discount),
            "photo"=> $fileName,
        ]);

        if(($request->question ?? 0) > 0 ){
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
        }
        if(count($request->video?? 0) > 0 ){
            foreach($request->video as $key => $value){
                PackageDetail::create([
                    "package_id"=> $package->id,
                    "course_id"=> $value,
                ]);
            }
        }
        if(count($request->pdf?? 0) > 0 ){
            foreach($request->pdf as $key => $value){
                PackageDetail::create([
                    "package_id"=> $package->id,
                    "course_id"=> $value,
                ]);
            }
        }
        return redirect()->route("package.index")->with("success","Data berhasil ditambahkan");
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
            "description"=> "required",
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
        $package->description = $request->description;
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
        return redirect()->route("package.index")->with("success","Data berhasil di update");
    }

    public function destroy($id)
    {
        $detailPackage = PackageDetail::where("package_id", $id);
        $package = Package::find($id);
        $detailPackage->delete();
        $package->delete();
        return redirect()->route("package.index")->with("success","Data berhasil ditambahkan");
    }
    

    public function apiPackage()
    {
        $packages = Package::all();
        $package = array_map(function($package){
            return [
                "id"=> $package['id'],
                'name'=> $package['name'],
                'type'=> $package['type'],
                'category'=> $package['category'],
                'price'=> $package['price'],
                'discount'=> $package['discount'],
                'description'=> $package['description'],
                'photo'=> $package['photo'],
                'list_package'=> array_map(function($detailPackage){
                    $exam = Exam::where('id', $detailPackage['exam_id'])->get();
                    foreach ($exam as $item){
                        return [
                            'id'=> $detailPackage['id'],
                            'id_course'=> $item->id,
                            'name'=> $item->name,
                            'is_review' => $detailPackage['is_review'],
                            'amount_acces'=> $detailPackage['amount_acces'],
                        ];
                    }
                    $exam = Course::where('id', $detailPackage['course_id'])->get();
                    foreach ($exam as $item){
                        return [
                            'id'=> $detailPackage['id'],
                            'id_course'=> $item->id,
                            'name'=> $item->name,
                            'is_review' => $detailPackage['is_review'],
                            'amount_acces'=> $detailPackage['amount_acces'],
                        ];
                    }
                }, PackageDetail::where("package_id",$package['id'])->get()->toArray()),
            ];
        },$packages->toArray());
        return response()->json([
            "status"=> 200,
            "message"=> "success",
            "data"=> $package
        ]);
    }

    public function apiPackageById($id)
    {
        $packages = Package::where("id", $id)->get();
        $package = array_map(function($package){
            return [
                "id"=> $package['id'],
                'name'=> $package['name'],
                'type'=> $package['type'],
                'category'=> $package['category'],
                'price'=> $package['price'],
                'discount'=> $package['discount'],
                'description'=> $package['description'],
                'photo'=> $package['photo'],
                'list_package'=> array_map(function($detailPackage){
                    $exam = Exam::where('id', $detailPackage['exam_id'])->get();
                    foreach ($exam as $item){
                        return [
                            'id'=> $detailPackage['id'],
                            'id_course'=> $item->id,
                            'name'=> $item->name,
                            'is_review' => $detailPackage['is_review'],
                            'amount_acces'=> $detailPackage['amount_acces'],
                        ];
                    }
                    $exam = Course::where('id', $detailPackage['course_id'])->get();
                    foreach ($exam as $item){
                        return [
                            'id'=> $detailPackage['id'],
                            'id_course'=> $item->id,
                            'name'=> $item->name,
                            'is_review' => $detailPackage['is_review'],
                            'amount_acces'=> $detailPackage['amount_acces'],
                        ];
                    }
                }, PackageDetail::where("package_id",$package['id'])->get()->toArray()),
            ];
        },$packages->toArray());
        return response()->json([
            "status"=> 200,
            "message"=> "success",
            "data"=> $package
        ]);
    }
}
