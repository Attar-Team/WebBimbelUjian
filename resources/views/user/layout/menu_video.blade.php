@extends('template.header')
@section('title', 'BumnMuda. | Video')
@section('content')
<div class="containers">
    <div class="sidebarngambang">

    </div>
    <div class="sidebars">
        <h1>Materi Kursus Bumn</h1>
        <div class="sidemenus">
            <div class="satu_menu active">
                <div class="menu_kiri">
                    <div class="nomer">
                        <p>01</p>
                    </div>
                    <div class="judul">
                        <h1>Judul Video</h1>    
                        <h2>sub judul Video</h2>    
                    </div>   
                </div>
                <img style="width: 30px; height: 30px;" src="{{ asset('img/icon_video.png') }}" alt="">
                <img style="display: none;" src="{{ asset('img/icon_gembok.png') }}" alt="">
            </div>
            <div class="satu_menu">
                <div class="menu_kiri">
                    <div class="nomer">
                        <p>01</p>
                    </div>
                    <div class="judul">
                        <h1>Judul Video</h1>    
                        <h2>sub judul Video</h2>    
                    </div>   
                </div>
                <img style="display: none; "  src="{{ asset('img/icon_video.png') }}" alt="">
                <img style="width: 25px; height: 25px;" src="{{ asset('img/icon_gembok.png') }}" alt="">
            </div>
            <div class="satu_menu">
                <div class="menu_kiri">
                    <div class="nomer">
                        <p>01</p>
                    </div>
                    <div class="judul">
                        <h1>Judul Video</h1>    
                        <h2>sub judul Video</h2>    
                    </div>   
                </div>
                <img style="display: none; "  src="{{ asset('img/icon_video.png') }}" alt="">
                <img style="width: 25px; height: 25px;" src="{{ asset('img/icon_gembok.png') }}" alt="">
            </div>
            <div class="satu_menu">
                <div class="menu_kiri">
                    <div class="nomer">
                        <p>01</p>
                    </div>
                    <div class="judul">
                        <h1>Judul Video</h1>    
                        <h2>sub judul Video</h2>    
                    </div>   
                </div>
                <img style="display: none; "  src="{{ asset('img/icon_video.png') }}" alt="">
                <img style="width: 25px; height: 25px;" src="{{ asset('img/icon_gembok.png') }}" alt="">
            </div>
            <div class="satu_menu">
                <div class="menu_kiri">
                    <div class="nomer">
                        <p>01</p>
                    </div>
                    <div class="judul">
                        <h1>Judul Video</h1>    
                        <h2>sub judul Video</h2>    
                    </div>   
                </div>
                <img style="display: none; "  src="{{ asset('img/icon_video.png') }}" alt="">
                <img style="width: 25px; height: 25px;" src="{{ asset('img/icon_gembok.png') }}" alt="">
            </div>
            <div class="satu_menu">
                <div class="menu_kiri">
                    <div class="nomer">
                        <p>01</p>
                    </div>
                    <div class="judul">
                        <h1>Judul Video</h1>    
                        <h2>sub judul Video</h2>    
                    </div>   
                </div>
                <img style="display: none; "  src="{{ asset('img/icon_video.png') }}" alt="">
                <img style="width: 25px; height: 25px;" src="{{ asset('img/icon_gembok.png') }}" alt="">
            </div>
            <div class="satu_menu">
                <div class="menu_kiri">
                    <div class="nomer">
                        <p>01</p>
                    </div>
                    <div class="judul">
                        <h1>Judul Video</h1>    
                        <h2>sub judul Video</h2>    
                    </div>   
                </div>
                <img style="display: none; "  src="{{ asset('img/icon_video.png') }}" alt="">
                <img style="width: 25px; height: 25px;" src="{{ asset('img/icon_gembok.png') }}" alt="">
            </div>
            <div class="satu_menu">
                <div class="menu_kiri">
                    <div class="nomer">
                        <p>01</p>
                    </div>
                    <div class="judul">
                        <h1>Judul Video</h1>    
                        <h2>sub judul Video</h2>    
                    </div>   
                </div>
                <img style="display: none; "  src="{{ asset('img/icon_video.png') }}" alt="">
                <img style="width: 25px; height: 25px;" src="{{ asset('img/icon_gembok.png') }}" alt="">
            </div>
            <div class="satu_menu">
                <div class="menu_kiri">
                    <div class="nomer">
                        <p>01</p>
                    </div>
                    <div class="judul">
                        <h1>Judul Video</h1>    
                        <h2>sub judul Video</h2>    
                    </div>   
                </div>
                <img style="display: none; "  src="{{ asset('img/icon_video.png') }}" alt="">
                <img style="width: 25px; height: 25px;" src="{{ asset('img/icon_gembok.png') }}" alt="">
            </div>
        </div>
            
        
    </div>
    <div class="kanan">
        <iframe  src="https://www.youtube.com/embed/B3Z4XGAxJB0?si=HNxCbRvqZD7ij-h5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <h1>Yang perlu Disiapkan</h1>
        <p class="deskripsi">Materi Bagian Pengenalan dan juga hal yang harus di siapkan</p>
        <h2>Alat yang digunakan di Kelas</h2>
    </div>
    
</div>

<script src="{{ asset('js/home.js') }}"></script>
@endsection
