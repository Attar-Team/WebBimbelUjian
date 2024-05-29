@extends('user.component.sidebar')
@section('title', 'BumnMuda. | setting')
@section('tampilan_dashboard')
<div class="menu_user">
    <h1>Setting</h1>
    <p>Semua yang dibutuhkan untuk meningkatkan proses belajar anda</p>
    <div class="menu_setting">
        <div class="kotak_setting">
            <img src="{{ asset('image/setting_profile.png') }}" alt="">
            <h1>Profileku</h1>
            <p>Ubah data dirimu sekarang</p>
            <button href="">Edit Sekarang</button>
        </div>
        <div class="kotak_setting">
            <img src="{{ asset('image/setting_profile.png') }}" alt="">
            <h1>Ubah password</h1>
            <p>Ubah passwordmu sekarang</p>
            <button href="">Ubah Sekarang</button>
        </div>
    </div>
</div>
@endsection