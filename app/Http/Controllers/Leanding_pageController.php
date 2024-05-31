<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class Leanding_pageController extends Controller
{
    public function home(){
        $packages = Package::withCount('order')
        ->get()
        ->map(function ($package) {
            $package->id_package = $package->id;
            return $package;
        });
        // dd($packages);
        $countPackageBumn = $packages->where("type","BUMN")->count();
        $countPackageCpns = $packages->where("type","CPNS")->count();
        
        $countOrderBUMN = Package::rightJoin('order_details','order_details.package_id','=','packages.id')
        ->where('packages.type','BUMN')->count('order_details.id');

        $countOrderCPNS = Package::rightJoin('order_details','order_details.package_id','=','packages.id')
        ->where('packages.type','CPNS')->count('order_details.id');
        
        return view('leanding_page.home',[
            'packages'=> $packages,
            'countOrderBUMN'=> $countOrderBUMN,
            'countOrderCPNS'=> $countOrderCPNS,
            'countPackageBumn'=> $countPackageBumn,
            'countPackageCpns'=> $countPackageCpns
        ]);
    }

    public function about(){
        return view('leanding_page.about');
    }

    public function paket(){
        return view('leanding_page.paket');
    }

    public function keranjang(){
        return view('leanding_page.keranjang');
    }

    public function detail_paket($id){
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
        
        return view('leanding_page.detail_paket',[
            'package'=> $package,
            'countExam'=> $countExam,
            'countVideo'=> $countVideo,
            'countBankSoal'=> $countBankSoal
        ]);
    }
}
