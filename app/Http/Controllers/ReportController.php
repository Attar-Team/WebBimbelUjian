<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $report = Order::all();
        return view("admin.layout.report",[
            "title"=> "Laporan",
            "reports"=> $report
        ]);
    }
}
