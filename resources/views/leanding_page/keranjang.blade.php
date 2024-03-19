@extends('template.header')
@section('title', 'Bumn Muda | Keranjang')
@section('content')
<script src="js/home.js"></script>
    <div class="keranjang cart_nonelogin ">
        <h1>Keranjang Belanja</h1>
        <h2><span>0</span> Paket di keranjang</h2>
        <div class="paket_keranjang">
            <img src="image/keranjang_kosongbg.png" alt="">
            <p>Keranjangmu lagi kosong nih, ayo cari dan segera temukan paket favoritmu</p>
            <a href="/paket"><Button>Login Dulu</Button></a>
        </div>
    </div>
    <div class="keranjang cartkosong_login">
        <h1>Keranjang Belanja</h1>
        <h2><span>0</span> Paket di keranjang</h2>
        <div class="paket_keranjang">
            <img src="image/keranjang_kosongbg.png" alt="">
            <p>Keranjangmu lagi kosong nih, ayo cari dan segera temukan paket favoritmu</p>
            <a href="/paket"><Button>Yuk Cari Paket..</Button></a>
        </div>
    </div>
    <div class="cartada_login keranjang">
        <h1>Keranjang Belanja</h1>
        <h2><span>2</span> Paket di keranjang</h2>
        
        <div class="gambarsatu_keranjang">
            <div class="garis_keranjang"></div>
            <div class="contoh_keranjang">
                <img src="image/contoh_paket.png" alt="">
                <div class="namapaket_dan_isi">
                    <h1>Paket Try Out 1 BUMN</h1>
                    <p><span>•</span> Tes Kemampuan Dasar (TKD)</p>
                    <p><span>•</span> Tes Ujian simulasi</p>
                    <p><span>•</span> Tes Logika</p>
                    <p><span>•</span> Paket Soal Lengkap</p>
                </div>
                <div class="deskripsi_paket">
                    <h1>Deskripsi</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.  Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id laudantium recusandae! Eaque, tempore. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta...</p>
                </div>
                <div class="total_paket">
                    <div class="hapus">
                        <h1>Total :</h1>
                        <a href=""><i class='bx bxs-trash' ></i></a>
                    </div>
                    
                    <h2 class="harga">Rp 55.000,00</h2>
                    <button>Beli Paket</button>
                </div>
            </div>
        </div>
        <div class="gambarsatu_keranjang">
            <div class="garis_keranjang"></div>
            <div class="contoh_keranjang">
                <img src="image/contoh_paket.png" alt="">
                <div class="namapaket_dan_isi">
                    <h1>Paket Kursus 2 CPNS</h1>
                    <p><span>•</span> Tes Kemampuan Dasar (TKD)</p>
                    <p><span>•</span> Tes Ujian simulasi</p>
                    <p><span>•</span> Tes Logika</p>
                    <p><span>•</span> Paket Soal Lengkap</p>
                </div>
                <div class="deskripsi_paket">
                    <h1>Deskripsi</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.  Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id laudantium recusandae! Eaque, tempore. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta...</p>
                </div>
                <div class="total_paket">
                    <div class="hapus">
                        <h1>Total :</h1>
                        <a href=""><i class='bx bxs-trash' ></i></a>
                    </div>
                    
                    <h2 class="harga">Rp 55.000,00</h2>
                    <button>Beli Paket</button>
                </div>
            </div>
        </div>
    </div>
    @include('template.footer')
@endsection 