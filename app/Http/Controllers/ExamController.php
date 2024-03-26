<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamRequest;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Exam::all();
        return view("admin.layout.exam",[
            'title' => 'Ujian',
            'data'=> $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.layout.add-exam",[
            'title' => 'Tambah Ujian'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExamRequest $request)
    {
        //mengubah jam menjadi format menit
        $waktu = $request->duration;
        list($jam, $menit) = explode(":", $waktu);
        $duration = ($jam * 60) + $menit;

        //mengecek apakah checkboc aktif
        $boolRandom = false;
        if($request->is_random == "on"){
            $boolRandom = true;
        }

        //menambahkan ke dalam database
        Exam::create([
            "name"=> $request->name,
            "duration"=> $duration,
            "amount_question"=> $request->amount_question,
            "is_random"=> $boolRandom
        ]);

        //setelah berhasil akan mengarahkan ke dalam halaman exam
        //dan mengirim data data success untuk di jadikan alaert
        return redirect('/admin/exam')->with("success","Data berhasil ditambahkan");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("admin.layout.update-exam",[
            "title"=> "Update Exam",
            "data"=> Exam::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExamRequest $request, string $id)
    {
            //mengubah jam menjadi format menit
            $waktu = $request->duration;
            list($jam, $menit) = explode(":", $waktu);
            $duration = ($jam * 60) + $menit;
    
            //mengecek apakah checkboc aktif
            $boolRandom = false;
            if($request->is_random == "on"){
                $boolRandom = true;
            }

        $data = Exam::find($id);
        $data->name = $request->name;
        $data->amount_question = $request->amount_question;
        $data->is_random = $boolRandom;
        $data->duration = $duration;
        $data->save();
        return redirect("/admin/exam")->with("success","Data berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exam = Exam::find($id);
        $exam->delete();
        return redirect("/admin/exam")->with("success","Data berhasil di hapus");
    }
}
