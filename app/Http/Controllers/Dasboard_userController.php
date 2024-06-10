<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use App\Models\PackageDetail;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Dasboard_userController extends Controller
{
    public function tampil_sidebar(){
         return view('user.component.sidebar');
    }

    public function tampil_userpaket(){
        // $packages = Order::with('package','order_details')
        // ->join('order_details','orders.id','=','order_details.order_id')
        // ->where('user_id',1)->get();
        // $packages = Package::join('order_details','order_details.package_id','=','packages.id')
        // ->join('orders','orders.id','=','order_details.order_id')
        // ->where('orders.user_id',1)
        // ->with('packageDetailPaket')
        // // ->with('course')
        // ->get();

        $order = Order::where('user_id',1)->get();
        // dd($packages);
        // dd($order->first()->order_details);
         return view('user.layout.paketku',[
            'orders'=> $order
         ]);
    }
    
public function tampil_uservideo($id){
    $package_detail = PackageDetail::where('package_id', $id)->get();
    return view('user.layout.menu_video',[
        'package_details'=> $package_detail
    ]);
}
public function tampil_userujian($id){
    $package_detail = PackageDetail::withCount(['answer'=> function (Builder $query) {
        $query->where('user_id',1);
    }])
    ->where('package_id', $id)->get();
    return view('user.layout.menu_ujian',[
        'package_details'=> $package_detail
    ]);
}

    public function tampil_userprogres(){
        return view('user.layout.progress');
    }

    public function tampil_usersetting(){
        return view('user.layout.setting');
    }

    public function tampil_usertransaksi(){
        $order = Order::where('user_id',1)->get();
        return view('user.layout.transaksi',[
            "order" => $order
        ]);
    }

    public function tampil_userisipaket($id){
        $packages = Package::find($id);
        $package_detail = PackageDetail::where('package_id', $id)->get();
        return view('user.layout.isi_paket',[
            'package_details'=> $package_detail,
            'package_id' => $id,
            'package'=> $packages
        ]);
    }

    public function tampil_freebanksoal($id){
        $package_detail = PackageDetail::where('package_id', $id)->get();
        return view('user.layout.Free_banksoal',[
            'package_details'=> $package_detail
        ]);
    }

}
