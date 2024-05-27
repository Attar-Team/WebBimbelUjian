<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index($id)
    {
        return view("leanding_page.order", [
            "package"=> Package::find($id)
        ]);
    }

    public function getToken(Request $request){

        $rand_id = "ORD".rand();
        $order = Order::create([
            "id"=> $rand_id,
            "user_id"=> 1,
            "package_id"=> $request->id,
            "date"=> now(),
            "gross_amount"=> 50000
        ]);
        
        // return response()->json(['token'=> $request->id]);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config("midtrans.server_key");
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->gross_amount
            ),
            'item_details'=> [[
                "id"=> '1',
                "price"=> 50000,
                "quantity"=> 1,
                "name"=> "Paket BUMN"
    ]],
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'saputra',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333'
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return response()->json(['token'=> $snapToken]);
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == "settlement" || $request->transaction_status == "capture"){
                Transaction::create([
                    "order_id"=> $request->order_id,
                    "gross_amount"=> $request->gross_amount,
                    "date"=> $request->transaction_time,
                    "payment_type"=> $request->payment_type,
                ]);
            }
        }
    }
}
