
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Home')</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/check_list.css">
    <link rel="stylesheet" href="/css/paket.css">
    <link rel="stylesheet" href="/css/detail_paket.css">
    <link rel="stylesheet" href="/css/scrollpaket-home.css">
    <link rel="stylesheet" href="/css/isi_paket.css">
    <link rel="stylesheet" href="/css/dashboard_user.css">
    <link rel="stylesheet" href="{{ asset('css/video.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <nav>
        <a href="{{ route('home') }}" class="logo">Bumn<span>Muda.</span></a>
        <div class="links">
            <a class="@active('home')" href="{{ route('home') }}">Home</a>
            <a class="@active('about')" href="{{ route('about') }}">About</a>
            <a class="@active('paket')" href="{{ route('paket') }}">Paket</a>
            @auth
            <a class="belajar @active('user-paket.*')" href="{{ route('user-paket.index') }}">Pembelajaran saya</a>
            @endauth
        </div>
        @guest
        <div class="button_header">
            <a href="{{ route('login') }}"><button class="login">Login</button></a>
            <button class="singup">Sing up</button>
        </div> 
        @endguest
        @auth
        <div class="masuk_akun">
            <a href="{{ route('keranjang') }}"><i class='bx bx-cart'></i></a>
            <p class="m-0 me-2">Adza zarif</p>
            <div class="profile-dropdown" >
                <img src="{{asset('image/zarif1.png')}}" alt="" id="profile-image">
                <div id="dropdown-menu" class="dropdown-content">
                    <a href="">Profile</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="btn" type="submit">Logout</button>
                      </form>
                </div>
            </div>
        </div>
        @endauth
    </nav>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const profileImage = document.getElementById('profile-image');
    const dropdownMenu = document.getElementById('dropdown-menu');
    
    profileImage.addEventListener('click', function() {
        dropdownMenu.classList.toggle('showw');
    });
    
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('#profile-image')) {
            if (dropdownMenu.classList.contains('showw')) {
                dropdownMenu.classList.remove('showw');
            }
        }
    };
    });
    </script>

        @yield('content')

