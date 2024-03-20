@extends('template.header')
@section('title', 'Bumn Muda | Detail Paket')
@section('content')
    <script src="js/home.js"></script>
    <script src="js/detail_paket.js"></script>
    <div class="detail_paket">
        <div class="detail_paketkiri">
            <img src="image/contoh_paket.png" alt="">
            <div class="keterangan_detailpaket">
                <div class="ket">
                    <i class='bx bxs-user-detail'></i>
                    <span>142 Murid</span>
                </div>
                <div class="ket">
                    <i class='bx bx-time-five'></i>
                    <span>6 Jam / Hari</span>
                </div>
                <div class="ket">
                    <i class='bx bx-certification' ></i>
                    <span>Sertifikat</span>
                </div>
            </div>
                <h1>Mentor</h1>
                <div class="mentor">
                    <img src="image/zarif1.png" alt="">
                    <div class="nama_mentor">
                        <h2>Admin</h2>
                        <p>Pelatih Bumn dan CPNS</p>
                    </div>
                </div>
                <h1>Deskripsi</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id laudantium recusandae! Eaque, tempore. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id laudantium recusandae! Eaque, tempore.</p>
                <h1>Persyaratan</h1>
                <p><span>•</span> Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                <p><span>•</span> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora</p>
                <h1>Materi</h1>
            
        </div>
        <div class="detail_paketkanan_terbang">

        </div>
        <div class="detail_paketkanan">
            <h1>Paket Kursus BUMN</h1>
            <h2>Rp 500.000</h2>
            <div class="atasisi_detailpaket">
                <div class="isi_detailpaket">
                    <i class='bx bx-play'></i>
                    <h3>7 Video Pembelajaran</h3>
                </div>
                <div class="isi_detailpaket">
                    <i class='bx bx-file'></i>
                    <h3>7 Latihan soal</h3>
                </div>
                <div class="isi_detailpaket">
                    <i class='bx bx-task' ></i>
                    <h3>7 Simulasi Ujian</h3>
                </div>
            </div>
            
            <button class="masuk_keranjang">Masukkan keranjang</button>
            <button class="beli_detailpaket">Beli Paket</button>
        </div>
    </div>
    
    @include('template.footer')
@endsection