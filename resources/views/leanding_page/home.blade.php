@extends('template.header')

@section('title', 'BumnMuda. | Home')

@section('content')

    @php
        use App\Util\FormatRupiah;
    @endphp
    <script src="js/home.js"></script>
    <div class="image_left">
        <img src="image/bg_halamanutama1.png" alt="">
    </div>
    <header>
        <div class="left">
            <h1>Mau Keterima di <span>BUMN ?</span></h1>
            <h2>Bumn<span>Muda.</span> Solusinya!</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita
                eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id laudantium recusandae!
                Eaque, tempore.</p>
            <div class="button_left">
                <button class="belajar">Belajar Sekarang!</button>
                <button class="contact">Contact</button>
            </div>
        </div>
        <img data-aos="zoom-in" src="image/baruubg.png" alt="">
    </header>
    <div class="title">
        <h1>Kenapa harus pilih BumnMuda?</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita
            eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id</p>
        <div class="keunggulan">
            <img data-aos="zoom-in-up" data-aos-once="true" src="image/bg-shadw.png" alt="">
            <div class="bagiankiri_keunggulan" data-aos="fade-left" data-aos-once="true">
                <div class="list">
                    <div class="judul_keunggulan">
                        <i class='bx bx-book'></i>
                        <h1>Materi yang terupdate</h1>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate</p>
                </div>
                <div class="list">
                    <div class="judul_keunggulan">
                        <i class='bx bx-task'></i>
                        <h1>Latian Soal Berbobot</h1>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate</p>
                </div>
                <div class="list">
                    <div class="judul_keunggulan">
                        <i class='bx bx-play'></i>
                        <h1>Video Pembelajaran</h1>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate</p>
                </div>
                <div class="list">
                    <div class="judul_keunggulan">
                        <i class='bx bx-file'></i>
                        <h1>Bank soal yang berkualitas</h1>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate</p>
                </div>
            </div>

        </div>
    </div>

    <div class="program bgbiru">
        <h1 style="color: #fff">Program yang kami sediakan</h1>
        <p class="des" style="color: #fff">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta,
            repudiandae
            voluptate ea, expedita
            eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id</p>
        <div class="kelas">
            <div id="btnBumn" class="macam_kelas active-title">
                <h1>Kelas BUMN</h1>
                <i class='bx bxs-book'></i>
            </div>
            <div id="btnCpns" class="macam_kelas">
                <h1>Kelas CPNS</h1>
                <i class='bx bxs-book'></i>
            </div>
        </div>
        <div id="paketBumn" class="contohpaket">
            <div class="kiri_paket">
                <h1>Paket Kursus BUMN</h1>
                <div class="keteranganpaket">
                    <i class='bx bxs-user'></i>
                    <p>{{ $countOrderBUMN }} Murid</p>
                </div>
                <div class="keteranganpaket">
                    <i class='bx bxs-time-five'></i>
                    <p>{{ $countPackageBumn }} Jenis Paket</p>
                </div>
                <div class="garis"></div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea,
                    expedita eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id</p>
                <a href="{{ route('paket') }}"><button>Lihat Detail</button></a>
            </div>
            <div class="kanan_paket">

                <div class="swiper-paket mySwiperPaket">
                    <div class="swiper-wrapper">
                        @foreach ($packages as $package)
                            @if ($package->type = 'BUMN')
                                <div class="swiper-slide width-paket">
                                    <div class="contoh_paketss">
                                        <img src="{{ asset('image/contoh_paket.png') }}" alt="">
                                        <h1 class="mt-2">{{ $package['name'] }}</h1>
                                        @foreach ($package->packageDetail as $key => $item)
                                            <?php
                                            $courseName = $item->course->name ?? '';
                                            $examName = $item->exam->name ?? '';
                                            ?>
                                            @if ($courseName != '')
                                                <p><span>•</span> {{ $item->course->name }}</p>
                                            @endif
                                            @if ($examName != '')
                                                <p><span>•</span> {{ $item->exam->name }}</p>
                                            @endif

                                            @if ($key == 4)
                                            @break
                                        @endif
                                    @endforeach

                                    <h5 class="px-3 pt-2 mb-0" style="font-weight: bold">Rp
                                        {{ FormatRupiah::Rupiah($package->price - $package->discount ) }}</h5>
                                        <p class="discount">Rp{{ FormatRupiah::Rupiah($package->price) }}</p>

                                    <div class="d-flex px-3 py-2">
                                        <i class='bx bxs-user'></i>
                                        <p>{{ $package->order_count }} Murid</p>
                                    </div>

                                    <a href="{{ route('detail_paket', $package->id) }}"><button>Detail
                                            Paket</button></a>

                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>


        </div>
    </div>
    <div id="paketCpns" style="display: none" class="contohpaket">
        <div class="kiri_paket">
            <h1>Paket Kursus CPNS</h1>
            <div class="keteranganpaket">
                <i class='bx bxs-user'></i>
                <p>142 Students</p>
            </div>
            <div class="keteranganpaket">
                <i class='bx bxs-time-five'></i>
                <p>6 Hours / days</p>
            </div>
            <div class="garis"></div>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea,
                expedita eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id</p>
            <a href="{{ route('paket') }}"><button>Lihat Detail</button></a>
        </div>
        <div class="kanan_paket">

            <div class="swiper-paket mySwiperPaket">
                <div class="swiper-wrapper">
                    @foreach ($packages as $package)
                        @if ($package->type == 'CPNS')
                            <div class="swiper-slide width-paket">
                                <div class="contoh_paketss">
                                    <img src="{{ asset('image/contoh_paket.png') }}" alt="">
                                    <h1 class="mt-2">{{ $package['name'] }}</h1>
                                    @foreach ($package->packageDetail as $item)
                                        <?php
                                        $courseName = $item->course->name ?? '';
                                        $examName = $item->exam->name ?? '';
                                        ?>
                                        @if ($courseName != '')
                                            <p><span>•</span> {{ $item->course->name }}</p>
                                        @endif
                                        @if ($examName != '')
                                            <p><span>•</span> {{ $item->exam->name }}</p>
                                        @endif
                                    @endforeach

                                    <h5 class="px-3 pt-2 " style="font-weight: bold">Rp
                                        {{ FormatRupiah::Rupiah($package->price ) }}</h5>

                                        <p class="discount">Rp{{ FormatRupiah::Rupiah($package->price) }}</p>

                                    <div class="d-flex px-3 py-2">
                                        <i class='bx bxs-user'></i>
                                        <p>{{ $package->order_count }} Murid</p>
                                    </div>



                                    <a href="{{ 'isi_paket' }}"><button>Lanjutkan belajar</button></a>

                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>


        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiperpaket = new Swiper(".mySwiperPaket", {
        slidesPerView: 3,
        spaceBetween: 30,
        freeMode: true,
        loop: true,
        autoplay: {
            delay: 1000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
<div class="title" style="margin-top: 100px">
    <h1 style="margin-bottom: 30px">Tersedia dengan Mobile app</h1>
    <div class="halos">
        <img src="{{ asset('image/mobile.png') }}" alt="">
        <div class="kanan">
            <h1>Karena Pelayanan Terbaik adalah prioritas kami</h1>
            <p>Dapatkan juga versi mobile agar kemudahan pembelajaran bisa dilakukan dimana saja dan kapan saja. Dengan
                lebih dari 200Ribu download Di google playstore </p>
            <div class="mobile">
                <div class="kiri_mobile">
                    <h2>App Download</h2>
                    <p>200Rb+</p>
                </div>
                <div class="kanan_mobile">
                    <i class='bx bxl-android'></i>
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
        <i class='bx bx-chevrons-left kiri-testi'></i>
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
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta,
                                        repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum
                                        necessitatibus deserunt nihil in asperiores id.Lorem ipsum, dolor sit amet
                                        consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita
                                        eveniet eius velit tempora dolorum necessitatibus deserunt n</p>
                                    <h1>Adza Zarif Nur Iskandar ( Diterima di Telkom Indonesia )</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testi">
                        <div class="list_testi">
                            <div class="macam_testi">
                                <img src="image/zarif1.png" alt="">
                                <div class="komentar">
                                    <i class='bx bxs-quote-left'></i>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta,
                                        repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum
                                        necessitatibus deserunt nihil in asperiores id.Lorem ipsum, dolor sit amet
                                        consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita
                                        eveniet eius velit tempora dolorum necessitatibus deserunt n</p>
                                    <h1>Adza Zarif Nur Iskandar ( Diterima di Telkom Indonesia )</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="testi">
                        <div class="list_testi">
                            <div class="macam_testi">
                                <img src="image/zarif1.png" alt="">
                                <div class="komentar">
                                    <i class='bx bxs-quote-left'></i>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta,
                                        repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum
                                        necessitatibus deserunt nihil in asperiores id.Lorem ipsum, dolor sit amet
                                        consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita
                                        eveniet eius velit tempora dolorum necessitatibus deserunt n</p>
                                    <h1>Adza Zarif Nur Iskandar ( Diterima di Telkom Indonesia )</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="swiper-pagination"></div>
        </div>
    </div>

</div>
{{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}
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

<script type="text/javascript">
    $(document).ready(function() {
        $("#btnBumn").click(function() {
            $('#paketBumn').show();
            $('#paketCpns').hide();
            $('.macam_kelas').removeClass('active-title');
            $(this).addClass('active-title');
        });

        $("#btnCpns").click(function() {
            $('#paketBumn').hide();
            $('#paketCpns').show();
            $('.macam_kelas').removeClass('active-title');
            $(this).addClass('active-title');
        });
    });
</script>
@include('template.footer')
@endsection
