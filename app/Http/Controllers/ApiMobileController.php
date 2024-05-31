<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Package;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApiMobileController extends Controller
{
    public function order(Request $request)
    {
        $rand_id = "ORD".time().rand(1,9);
        $gross_amount = 0;
        $itemDetail = [];
        $itemDetailInvoicing = [];
        foreach($request->package_id as $value){
            $package = Package::find($value);
            array_push($itemDetail, [
                "name"=> $package->name,
                "price"=> $package->price,
                "quantity"=> 1,
                "id"=> $package->id,
            ]);
            array_push($itemDetailInvoicing,  [
                "item_id" => $package->id,
                "description" => $package->name,
                "quantity" => 1,
                "price" => $package->price,
            ]);
            $gross_amount += $package->price;
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

        return response()->json([
            "status"=> 201,
            "message"=> "success"
        ]);
    }

    public function transcation(Request $request)
    {
        $order = Order::where("id", $request->order_id)->first();
                $user = User::find($order->user_id);
                $orderDetail = OrderDetail::where("order_id", $request->order_id)->get();

                $name_package = [];

                foreach($orderDetail as $detail){
                    $package = Package::find($detail->package_id);
                    array_push( $name_package, [
                        "name_packag"=> $package->name,
                    ]);
                }

                    //kirim email
            //  Mail::to('adzazarf@gmail.com')->send(new MailInvoicing($user->name, $name_package, $request->gross_amount));

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

    public function purchasedPackage($id)
    {
        $data = OrderDetail::join("orders","orders.id","=","order_details.order_id")
        ->where('orders.user_id',$id)->get();
        
        return response()->json([
            "status"=> 200,
            "message"=> "success",
            "data" => $data
        ]);
    }
}
