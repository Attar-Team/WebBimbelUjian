
@extends('template.header')

@section('title', 'BumnMuda. | Home')

@section('content')

    
    <script src="js/home.js"></script>
    <div class="image_left">
        <img src="image/bg_halamanutama1.png" alt="">
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
                <a href="{{ route('paket') }}"><button>Lihat Detail</button></a>
            </div>
            <div class="kanan_paket">

                    <div class="swipers mySwiper">
                        <div class="swiper-wrapper">
                          <div class="swiper-slides"><div class="contoh_paketss">
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
                          <div class="swiper-slides">Slide 2</div>
                          <div class="swiper-slides">Slide 3</div>
                          <div class="swiper-slides">Slide 4</div>
                          <div class="swiper-slides">Slide 5</div>
                          <div class="swiper-slides">Slide 6</div>
                          <div class="swiper-slides">Slide 7</div>
                          <div class="swiper-slides">Slide 8</div>
                          <div class="swiper-slides">Slide 9</div>
                        </div>
                        <div class="swiper-pagination"></div>
                      </div>
                    

            </div>
        </div>
    </div>
    </div>
    <script>
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: 3,
          spaceBetween: 30,
          freeMode: true,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });
      </script>
    <div class="title">
        <h1>Tersedia dengan Mobile app</h1>
        <div class="halos">
            <img src="{{asset('image/mobile.png')}}" alt="">
            <div class="kanan">
                <h1>Karena Pelayanan Terbaik adalah prioritas kami</h1>
                <p>Dapatkan juga versi mobile agar kemudahan pembelajaran bisa dilakukan dimana saja dan kapan saja. Dengan lebih dari 200Ribu download Di google playstore </p>
                <div class="mobile">
                    <div class="kiri_mobile">
                        <h2>App Download</h2>
                        <p>200Rb+</p>
                    </div>
                    <div class="kanan_mobile">
                        <i class='bx bxl-android' ></i>
                        <div class="tulis_mobile">
                            <h4>avaible on</h4>
                            <p>Android</p>
                        </div>
                        <div class="kiw"><i class='bx bxs-download'></i></div>
                        <p>80,3 MB</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="title">
        <div class="halo">
            <i class='bx bx-chevrons-left kiri-testi' ></i>
            <i class='bx bx-chevrons-right kanan-testi'></i>
        </div>  
        
        <h1>Testimoni Siswa</h1>
        
        <div class="swipp">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="testi">
                <div class="list_testi">
                    <div class="macam_testi">
                        <img src="image/zarif1.png" alt="">
                        <div class="komentar">
                            <i class='bx bxs-quote-left'></i>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt n</p>
                            <h1>Adza Zarif Nur Iskandar ( Diterima di Telkom Indonesia )</h1>
                        </div>
                        </div>
                </div>
            </div>
        </div>
              <div class="swiper-slide">Slide 2</div>
              <div class="swiper-slide">Slide 3</div>

            </div>
            
            
            <div class="swiper-pagination"></div>
        </div>
    </div>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".kanan-testi",
    prevEl: ".kiri-testi",
  },
});
    </script>
    @include('template.footer')
@endsection

