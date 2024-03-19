
@extends('template.header')

@section('title', 'BumnMuda. | Home')

@section('content')
    <script src="js/home.js"></script>
    <div class="image_left">
        <img src="image/bg_halamanutama.png" alt="">
    </div>
    <header>
        <div class="left">
            <h1>Mau Keterima di <span>BUMN ?</span></h1>
            <h2>Bumn<span>Muda.</span> Solusinya!</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id laudantium recusandae! Eaque, tempore.</p>
            <div class="button_left">
                <button class="belajar">Belajar Sekarang!</button>
                <button class="contact">Contact</button>
            </div>
        </div>
        <img src="image/lanang_loro1.png" alt="">
    </header>
    <div class="title">
        <h1>Kenapa harus pilih BumnMuda?</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id</p>
        <div class="keunggulan">
            <div class="bagiankiri_keunggulan">
                <div class="list">
                    <div class="judul_keunggulan">
                        <i class='bx bx-book'></i>
                        <h1>Materi yang terupdate</h1>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate</p>
                </div>
                <div class="list">
                    <div class="judul_keunggulan">
                        <i class='bx bx-book'></i>
                        <h1>Materi yang terupdate</h1>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate</p>
                </div>
                <div class="list">
                    <div class="judul_keunggulan">
                        <i class='bx bx-book'></i>
                        <h1>Materi yang terupdate</h1>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate</p>
                </div>
                <div class="list">
                    <div class="judul_keunggulan">
                        <i class='bx bx-book'></i>
                        <h1>Materi yang terupdate</h1>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate</p>
                </div>
            </div>
            <img src="image/foto2.png" alt="">
        </div>
    </div>

    <div class="title bgbiru">
        <h1>Program yang kami sediakan</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id</p>
        <div class="kelas">
            <div class="macam_kelas">
                <h1>Kelas BUMN</h1>
                <i class='bx bxs-book'></i>
            </div>    
        </div>
        <div class="contohpaket">
            <div class="kiri_paket">
                <h1>Paket Kursus BUMN</h1>
                <div class="keteranganpaket">
                    <i class='bx bxs-user'></i>
                    <p>142 Students</p>
                </div>
                <div class="keteranganpaket">
                    <i class='bx bxs-time-five'></i>
                    <p>6 Hours / days</p>
                </div>
                <div class="garis"></div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id</p>
                <button>Lihat Detail</button>
            </div>
            <div class="kanan_paket">
                <div class="macam_isipaket">
                    <i class='bx bx-play'></i>
                    <h1>7 Video Pembelajaran</h1>
                </div>
                <div class="macam_isipaket">
                    <i class='bx bx-file'></i>
                    <h1>7 Latihan soal</h1>
                </div>
                <div class="macam_isipaket">
                    <i class='bx bx-task' ></i>
                    <h1>7 Simulasi Ujian</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="title">
        <h1>Testimoni Siswa</h1>
        <div class="testi">
            <i class='bx bx-chevrons-left' ></i>
            <div class="list_testi">
                <div class="macam_testi">
                    <img src="image/zarif1.png" alt="">
                    <div class="komentar">
                        <i class='bx bxs-quote-left'></i>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt n</p>
                        <h1>Adza Zarif Nur Iskandar ( Diterima di Telkom Indonesia )</h1>
                    </div>
                    </div>
                <div class="macam_testi">
                    <img src="image/zarif1.png" alt="">
                    <div class="komentar">
                        <i class='bx bxs-quote-left'></i>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt n</p>
                        <h1>Adza Zarif Nur Iskandar ( Diterima di Telkom Indonesia )</h1>
                    </div>
                    </div>
                </div>
                
            <i class='bx bx-chevrons-right' ></i>
        </div>
    </div>
    @include('template.footer')
@endsection

