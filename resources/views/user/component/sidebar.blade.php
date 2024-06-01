@extends('template.header')
@section('css',"{{asset('css/dashboard_user.css')}}")
@section('content')
    <div class="dasboard">
    {{-- <div class="sidebar_terbang"></div> --}}
    <div class="sidebar">
        <div class="user">
            <div class="akun_sidebar">
            <img src="{{asset('image/zarif1.png')}}" alt="">
            <div class="nama_user">
                <h1>Restu Imam Safii</h1>
                <h2>Cita - cita</h2>
            </div>
            </div>
                <ul class="p-0">
                    <li class="menu_item">
                        <a class="item @active('user_transaksi')"  href="{{ route('user_transaksi') }}">
                            <i class='bx bxs-shopping-bag-alt'></i>
                            <p>Transaksi</p>
                        </a>
                    </li>
                    <li class="menu_item">
                        <a class="item @active('user_paket')"  href="{{ route('user_paket') }}">
                            <i class='bx bxs-briefcase-alt-2'></i>
                            <p>Paketku</p>
                        </a>
                    </li>
                    <li class="menu_item">
                        <a class="item @active('user_progres')"  href="{{ route('user_progres') }}">
                            <i class='bx bxl-deezer'></i>
                            <p>Progress Belajar</p>
                        </a>
                    </li>
                    <li class="menu_item">
                        <a class="item @active('user_setting')"  href="{{ route('user_setting') }}">
                            <i class='bx bxs-cog' ></i>
                            <p>Setting</p>
                        </a>
                    </li>
                </ul>
            
            
        </div>
    </div>
    @yield('tampilan_dashboard')      
    </div>
    
</body>
</html>
@endsection