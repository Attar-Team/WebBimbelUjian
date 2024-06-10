<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use App\Models\Paket;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $data = DB::table("paket")->get();
        // $data = Paket::all();
        // dd($data);

        $user = User::where("role", "user")->get()->count();
        $package = Package::all()->count();
        $pemesanan = Order::all()->count();
        $pemasukan = Order::all()->sum("gross_amount");
        $pemesananDays = Order::whereDate("date",date("Y-m-d"))->get()->count();
        $pemasukanDays = Order::whereDate("date",date("Y-m-d"))->get()->sum('gross_amount');
        return view("admin.layout.dashboard",[
            "title"=> "Dashboard",
            "user"=> $user,
            "package"=> $package,
            "pemesanan"=> $pemesanan,
            "pemasukan"=> $pemasukan,
            "pemesananDays"=> $pemesananDays,
            "pemasukanDays"=> $pemasukanDays
        ]);
    }
}
