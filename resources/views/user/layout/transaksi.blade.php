@extends('user.component.sidebar')
@section('title', 'BumnMuda. | transaksi')
@section('tampilan_dashboard')
<div class="menu_user">
    <h1>Transaksi</h1>
    <p>Daftar pembelian paket premium anda</p>
    <div class="menu_setting">
        <div class="kotak_setting">
            <img src="{{ asset('image/transaksi_user.png') }}" alt="">
            <h1>Daftar Paket</h1>
            <p>Semua daftar pembelian paket anda</p>
            <button href="">Detail</button>
        </div>
    </div>
</div>
@endsection