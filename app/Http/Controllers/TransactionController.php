<?php

namespace App\Http\Controllers;

use App\Mail\MailInvoicing;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Package;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    public function index($id)
    {
        $package = Package::find($id);
        $countExam = 0;
        $countVideo = 0;
        $countBankSoal = 0;
        foreach ($package->packageDetail as $item){
        
        $courseName = $item->course->name ?? '';
        $examName = $item->exam->name ?? '';
       
       

        if ($courseName != ''){
            if ($item->course->type == "file pdf")  {
                $countBankSoal++;
            }else{
                $countVideo++;
            }
        }
        if ($examName != ''){
            $countExam++;
        }

        }
        return view("leanding_page.order", [
            'package'=> $package,
            'countExam'=> $countExam,
            'countVideo'=> $countVideo,
            'countBankSoal'=> $countBankSoal
        ]);
    }

    public function getToken(Request $request){

        $rand_id = "ORD".time().rand(1,9);
        $gross_amount = 0;
        $itemDetail = [];
        $itemDetailInvoicing = [];
        foreach($request->package_id as $value){
            $package = Package::find($value);
            $price = $package->price - $package->discount;
            array_push($itemDetail, [
                "name"=> $package->name,
                "price"=> $price,
                "quantity"=> 1,
                "id"=> $package->id,
            ]);

            $gross_amount += $price;
        }
        // return response()->json(['token'=> $itemDetail]);
        $order = Order::create([
            "id"=> $rand_id,
            "user_id"=> 1,
            "status"=> 'unpaid',
            "date"=> now(),
            "gross_amount"=> $gross_amount
        ]);


        
        foreach($request->package_id as $value){
            OrderDetail::create([
                "order_id"=> $order->id,
                "package_id"=> $value,
            ]);
        }

        
        
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
            'item_details'=> $itemDetail,
            // 'customer_details' => array(
            //     'first_name' => Auth::user()->name,
            //     'last_name' => '.',
            //     'email' => Auth::user()->email,
            //     'phone' => Auth::user()->no_telp
            // ),
            'customer_details' => array(
                'first_name' => "adza",
                'last_name' => 'zarif',
                'email' => "adzazarf@gmail.com",
                'phone' => '085942972801',
            ),
        );
//         $auth = config("midtrans.server_key").":";
//         $serverEncode = "Basic ".base64_encode($auth);
//         $sekarang = Carbon::now(); // Mendapatkan waktu sekarang
//         $tanggalBaru = $sekarang->addDays(1); // Menambahkan 5 hari
//         $tanggalBaru = $tanggalBaru->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s O');
// $noww = Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s O');

//         $data = [
//             "order_id" => $order->id,
//             "invoice_number" => $order->id,
//             "due_date" => "$tanggalBaru",
//             "invoice_date" => "$noww",
//             // "due_date"=> "2025-08-06 20:03:04 +0700",
//             // "invoice_date"=> "2025-01-06 20:03:04 +0700",
//             "customer_details" => [
//                 "id" => "customer_id",
//                 "name" => "merchant A",
//                 "email" => "merchant@midtrans.com",
//                 "phone" => "82313123123"
//             ],
//             "payment_type" => "virtual_account",
//             "item_details" => $itemDetailInvoicing,
//             "notes" => "just a notes",
//             "virtual_accounts"=> [
//                 [
//                     "bank"=> "bri_va"
//                 ],
//             ],
//             "amount" => [
//                 "shipping" => "11"
//             ]
//         ];
//         $response = Http::withHeaders([
//             'Content-Type' => 'application/json',
//             'Accept' => 'application/json',
//             'Authorization' => $serverEncode
//         ])->post('https://api.sandbox.midtrans.com/v1/invoices', $data);

        
//             $res = json_decode($response);
             
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return response()->json(['token'=> $snapToken]);
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == "settlement" || $request->transaction_status == "capture"){
    
                $order = Order::where("id", $request->order_id)->first();
                $user = User::find($order->user_id);
                $orderDetail = OrderDetail::where("order_id", $request->order_id)->get();

                $name_package = [];

                $result_discount = 0;
                $sub_total = 0;
                foreach($orderDetail as $detail){
                    $package = Package::find($detail->package_id);
                    array_push( $name_package, [
                        "name_packag"=> $package->name,
                        "price"=> $package->price,
                        "discount"=> $package->discount,
                    ]);

                    $sub_total += $package->price;
                    $result_discount += $package->discount;
                }

                    //kirim email
                    Mail::to('adzazarf@gmail.com')->send(new MailInvoicing($user->name, $name_package, $request->gross_amount,$request->transaction_time,$request->order_id,$result_discount,$sub_total));

                     //update status
                     
                     $order->status = "paid";
                     $order->save();

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
