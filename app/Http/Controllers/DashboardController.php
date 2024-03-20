<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $data = DB::table("paket")->get();
        // $data = Paket::all();
        // dd($data);
        return view("admin.layout.dashboard");
    }
}
