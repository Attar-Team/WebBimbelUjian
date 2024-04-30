<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Leanding_pageController extends Controller
{
    public function home(){
        return view('leanding_page.home');
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

    public function detail_paket(){
        return view('leanding_page.detail_paket');
    }
}
