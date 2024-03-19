<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Home')</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/keranjang.css">
</head>
<body>
    <nav>
        <a href="{{ route('home') }}" class="logo">Bumn<span>Muda.</span></a>
        <div class="links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('paket') }}">Paket</a>
            <a class="belajar" href="">Pembelajaran saya</a>
        </div>
        <div class="button_header">
            <a href="{{ route('keranjang') }}"><i class='bx bx-cart' ></i></a>
            <a href=""><button class="login">Login</button></a>
            <button class="singup">Sing up</button>
        </div>
        <div class="masuk_akun">
            <a href="{{ route('keranjang') }}"><i class='bx bx-cart' ></i></a>
            <p>Adza zarif</p>
            <img src="image/zarif1.png" alt="">
        </div>
    </nav>
    
        @yield('content')

