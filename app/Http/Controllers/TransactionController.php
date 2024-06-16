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
            "user_id"=> $request->ids,
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

        $user = User::find($request->ids);
        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->gross_amount
            ),
            'item_details'=> $itemDetail,
            'customer_details' => array(
                'first_name' => $user->name,
                'last_name' => '.',
                'email' => $user->email,
                'phone' => $user->no_telp
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
                $order->status = "paid";
                $order->save();

            Transaction::create([
                "order_id"=> $request->order_id,
                "gross_amount"=> $request->gross_amount,
                "date"=> $request->transaction_time,
                "payment_type"=> $request->payment_type,
            ]);
                    //kirim email
                    Mail::to($user->email)->send(new MailInvoicing($user->name, $name_package, $request->gross_amount,$request->transaction_time,$request->order_id,$result_discount,$sub_total));

                     //update status
                     
                  
            }
        }
    }
}
