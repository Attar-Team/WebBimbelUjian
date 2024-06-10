
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BumnMuda | login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <nav>
        <a class="logo" href="">Bumn<span>Muda.</span></a>
        <div class="link_nav">
            <a href="">Home</a>
            <a href="">Sign in</a>
            <a href="">Sign up</a>
        </div>
    </nav>
    @yield('content')
    
    