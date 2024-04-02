<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dasboard_userController extends Controller
{
    public function tampil_sidebar(){
         return view('user.component.sidebar');
    }

    public function tampil_userpaket(){
         return view('user.layout.paketku');
    }
    
    public function tampil_userprogres(){
        return view('user.layout.progress');
    }

    public function tampil_usersetting(){
        return view('user.layout.setting');
    }

    public function tampil_usertransaksi(){
        return view('user.layout.transaksi');
    }

    public function tampil_userisipaket(){
        return view('user.layout.isi_paket');
    }

}
