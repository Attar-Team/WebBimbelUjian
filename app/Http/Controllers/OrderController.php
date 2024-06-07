<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::with("user")->get();
        return view("admin.layout.order",[
            "title"=> "Pemesanan",
            "orders"=> $order
        ]);
    }
}
