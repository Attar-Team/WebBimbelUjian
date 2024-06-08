<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Package;
use App\Models\PackageDetail;
use App\Models\Question;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\ToArray;

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


    public function historyTransaction($id)
    {
        $data = Order::where("user_id", $id)->get();
        $package = [];

        $asd = array_map(function($item){
            return [
                "id"=> $item['id'],
                "user_id"=> 1,
                "date"=> $item['date'],
                "gross_amount"=> $item['gross_amount'],
                "status"=> $item['status'],
                "package_id" => array_map(function($detail){
                    return $detail['package_id'];
                },OrderDetail::where('order_id', $item['id'])->get()->toArray())
            ];
        },$data->toArray());
        return response()->json([
                "status"=> 200,
                "message"=> "success",
                "data"=> $asd
        ]);
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
                            'id_detail'=> $item->id,
                            'jenis'=> 'exam',
                            'name'=> $item->name,
                            'is_review' => $detailPackage['is_review'],
                            'amount_acces'=> $detailPackage['amount_acces'],
                        ];
                    }
                    $exam = Course::where('id', $detailPackage['course_id'])->get();
                    foreach ($exam as $item){
                        return [
                            'id'=> $detailPackage['id'],
                            'id_detail'=> $item->id,
                            'jenis'=> 'course',
                            'name'=> $item->name,
                            'type_course'=> $item->type,
                            'url'=> $item->url,
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

    public function question($id)
    {
        $question = Question::where('exam_id','=',$id)->get();

        return response()->json([
            'status'=> 200,
            'message'=> 'success',
            'data'=> $question
        ]);
    }
}
