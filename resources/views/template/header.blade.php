<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Home')</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('css/check_list.css')}}">
    <link rel="stylesheet" href="{{asset('css/paket.css')}}">
    <link rel="stylesheet" href="{{asset('css/detail_paket.css')}}">
    <link rel="stylesheet" href="{{asset('css/scrollpaket-home.css')}}">
    <link rel="stylesheet" href="{{asset('css/isi_paket.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard_user.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav>
        <a href="{{ route('home') }}" class="logo">Bumn<span>Muda.</span></a>
        <div class="links">
            <a class="@active('home')" href="{{ route('home') }}">Home</a>
            <a class="@active('about')" href="{{ route('about') }}">About</a>
            <a class="@active('paket')" href="{{ route('paket') }}">Paket</a>
            <a class="belajar @active('user_paket')" href="{{ route('user_paket') }}">Pembelajaran saya</a>
        </div>
        <div class="button_header">
            <a href="{{ route('keranjang') }}"><i class='bx bx-cart' ></i></a>
            <a href=""><button class="login">Login</button></a>
            <button class="singup">Sing up</button>
        </div>
        <div class="masuk_akun">
            <a href="{{ route('keranjang') }}"><i class='bx bx-cart' ></i></a>
            <p>Adza zarif</p>
            <img src="{{asset('image/zarif1.png')}}" alt="">
        </div>
    </nav>
    
        @yield('content')

