@extends('user.component.sidebar')
@section('title', 'BumnMuda. | paketku')
@section('tampilan_dashboard')
<script src="{{ asset('js/dashboard_user.js') }}"></script>
    
    <div class="menu_user">
    <h1>Paketku</h1>
    <p>Mempermudah melihat semua paket yang telah anda beli</p>
    <h2>Mari mulai belajar,
        Restu Imam Safii</h2>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum </p>
    <div class="kotak">

    </div>
    <h3>Paket anda</h3>
    <div class="grup_paket">
        <div class="contoh_pakets">
            <img src="{{ asset('image/contoh_paket.png') }}" alt="">
            <h1>Paket Try Out BUMN 1</h1>
            <p><span>•</span> Tes Kemampuan Dasar (TKD)</p>
            <p><span>•</span> Tes Ujian simulasi</p>
            <p><span>•</span> Tes Logika</p>
            <p><span>•</span> Paket Soal Lengkap</p>
            <div class="keterangan_paket">
                <i class='bx bx-check'></i>
                <h2>Telah dibeli</h2>
            </div>
            
            <div class="button_paket">
                <a href="{{ 'isi_paket' }}"><button>Lanjutkan belajar</button></a>

            </div>
        </div>
        <div class="contoh_pakets">
            <img src="{{ asset('image/contoh_paket.png') }}" alt="">
            <h1>Paket Try Out BUMN 1</h1>
            <p><span>•</span> Tes Kemampuan Dasar (TKD)</p>
            <p><span>•</span> Tes Ujian simulasi</p>
            <p><span>•</span> Tes Logika</p>
            <p><span>•</span> Paket Soal Lengkap</p>
            <div class="keterangan_paket">
                <i class='bx bx-check'></i>
                <h2>Telah dibeli</h2>
            </div>
            <div class="button_paket">
                <a href="{{ 'isi_paket' }}"><button>Lanjutkan belajar</button></a>

            </div>
        </div>
        <div class="contoh_pakets">
            <img src="{{ asset('image/contoh_paket.png') }}" alt="">
            <h1>Paket Try Out BUMN 1</h1>
            <p><span>•</span> Tes Kemampuan Dasar (TKD)</p>
            <p><span>•</span> Tes Ujian simulasi</p>
            <p><span>•</span> Tes Logika</p>
            <p><span>•</span> Paket Soal Lengkap</p>
            <div class="keterangan_paket">
                <i class='bx bx-check'></i>
                <h2>Telah dibeli</h2>
            </div>
            <div class="button_paket">
                <a href="{{ 'isi_paket' }}"><button>Lanjutkan belajar</button></a>

            </div>
        </div>
    </div>
    </div>
    
@endsection