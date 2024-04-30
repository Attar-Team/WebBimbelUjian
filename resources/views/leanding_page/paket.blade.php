@extends('template.header')
@section('title', 'Bumn Muda | Paket')
@section('content')
    <script src="js/home.js"></script>
    <script src="js/check_list.js"></script>
    <div class="atas_menupaket">
        <h1>#Ayo segera belajar dengan Bumn <span>Muda.</span></h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate </p>
    </div>
    <div class="menu_paket">
        <h1 class="caripaket">Cari paket sesuai keinginanmu</h1>
        <div class="paket_database">
            <div class="paket_terbang">

            </div>
            <div class="paket_list">

                <h1>Jenis</h1>
                <div class="apa">
                    <div class="check">
                        <input id="bumn" type="checkbox" class="custom-checkbox" data-group="1" onclick="toggleCheckbox('1', this)">
                        <label for="bumn">BUMN</label>
                    </div>
                    <div class="check">
                        <input id="cpns" type="checkbox" class="custom-checkbox" data-group="1" onclick="toggleCheckbox('1', this)">
                        <label for="cpns">CPNS</label>
                    </div>
                    
                </div>
                <h1>Kategori</h1>
                <div class="apa">
                    <div class="check">
                        <input id="kursus" type="checkbox" class="custom-checkbox" data-group="2" onclick="toggleCheckbox('2', this)">
                        <label for="kursus">Kursus</label> 
                    </div>
                    <div class="check">
                        <input id="tryout" type="checkbox" class="custom-checkbox" data-group="2" onclick="toggleCheckbox('2', this)">
                        <label for="tryout">Try Out</label>
                    </div>
                    
                </div>
            </div>
            {{-- @foreach ($collection as $item) --}}
            <div class="grup_paket">
                <div class="contoh_paket">
                    <img src="image/contoh_paket.png" alt="">
                    <h1>Paket Try Out BUMN 1</h1>
                    <p><span>•</span> Tes Kemampuan Dasar (TKD)</p>
                    <p><span>•</span> Tes Ujian simulasi</p>
                    <p><span>•</span> Tes Logika</p>
                    <p><span>•</span> Paket Soal Lengkap</p>
                    <h2>Rp 35.000,00</h2>
                    <div class="button_paket">
                        <a href="{{ 'detail_paket' }}"><button>Detail Paket</button></a>
                        <a href=""><i class='bx bxs-cart-add'></i></a>
                    </div>
                </div>
            {{-- @endforeach --}}
            
                <div class="contoh_paket">
                    <img src="image/contoh_paket.png" alt="">
                    <h1>Paket Try Out BUMN 1</h1>
                    <p><span>•</span> Tes Kemampuan Dasar (TKD)</p>
                    <p><span>•</span> Tes Ujian simulasi</p>
                    <p><span>•</span> Tes Logika</p>
                    <p><span>•</span> Paket Soal Lengkap</p>
                    <h2>Rp 35.000,00</h2>
                    <div class="button_paket">
                        <a href="{{ 'detail_paket' }}"><button>Detail Paket</button></a>
                        <a href=""><i class='bx bxs-cart-add'></i></a>
                    </div>
                </div>
                <div class="contoh_paket">
                    <img src="image/contoh_paket.png" alt="">
                    <h1>Paket Try Out BUMN 1</h1>
                    <p><span>•</span> Tes Kemampuan Dasar (TKD)</p>
                    <p><span>•</span> Tes Ujian simulasi</p>
                    <p><span>•</span> Tes Logika</p>
                    <p><span>•</span> Paket Soal Lengkap</p>
                    <h2>Rp 35.000,00</h2>
                    <div class="button_paket">
                        <a href="{{ 'detail_paket' }}"><button>Detail Paket</button></a>
                        <a href=""><i class='bx bxs-cart-add'></i></a>
                    </div>
                </div>
                <div class="contoh_paket">
                    <img src="image/contoh_paket.png" alt="">
                    <h1>Paket Try Out BUMN 1</h1>
                    <p><span>•</span> Tes Kemampuan Dasar (TKD)</p>
                    <p><span>•</span> Tes Ujian simulasi</p>
                    <p><span>•</span> Tes Logika</p>
                    <p><span>•</span> Paket Soal Lengkap</p>
                    <h2>Rp 35.000,00</h2>
                    <div class="button_paket">
                        <a href="{{ 'detail_paket' }}"><button>Detail Paket</button></a>
                        <a href=""><i class='bx bxs-cart-add'></i></a>
                    </div>
                </div>
                <div class="contoh_paket">
                    <img src="image/contoh_paket.png" alt="">
                    <h1>Paket Try Out BUMN 1</h1>
                    <p><span>•</span> Tes Kemampuan Dasar (TKD)</p>
                    <p><span>•</span> Tes Ujian simulasi</p>
                    <p><span>•</span> Tes Logika</p>
                    <p><span>•</span> Paket Soal Lengkap</p>
                    <h2>Rp 35.000,00</h2>
                    <div class="button_paket">
                        <a href="{{ 'detail_paket' }}"><button>Detail Paket</button></a>
                        <a href=""><i class='bx bxs-cart-add'></i></a>
                    </div>
                </div>
                <div class="contoh_paket">
                    <img src="image/contoh_paket.png" alt="">
                    <h1>Paket Try Out BUMN 1</h1>
                    <p><span>•</span> Tes Kemampuan Dasar (TKD)</p>
                    <p><span>•</span> Tes Ujian simulasi</p>
                    <p><span>•</span> Tes Logika</p>
                    <p><span>•</span> Paket Soal Lengkap</p>
                    <h2>Rp 35.000,00</h2>
                    <div class="button_paket">
                        <a href="{{ 'detail_paket' }}"><button>Detail Paket</button></a>
                        <a href=""><i class='bx bxs-cart-add'></i></a>
                    </div>
                </div>
                <div class="contoh_paket">
                    <img src="image/contoh_paket.png" alt="">
                    <h1>Paket Try Out BUMN 1</h1>
                    <p><span>•</span> Tes Kemampuan Dasar (TKD)</p>
                    <p><span>•</span> Tes Ujian simulasi</p>
                    <p><span>•</span> Tes Logika</p>
                    <p><span>•</span> Paket Soal Lengkap</p>
                    <h2>Rp 35.000,00</h2>
                    <div class="button_paket">
                        <a href="{{ 'detail_paket' }}"><button>Detail Paket</button></a>
                        <a href=""><i class='bx bxs-cart-add'></i></a>
                    </div>
                </div>
                <div class="contoh_paket">
                    <img src="image/contoh_paket.png" alt="">
                    <h1>Paket Try Out BUMN 1</h1>
                    <p><span>•</span> Tes Kemampuan Dasar (TKD)</p>
                    <p><span>•</span> Tes Ujian simulasi</p>
                    <p><span>•</span> Tes Logika</p>
                    <p><span>•</span> Paket Soal Lengkap</p>
                    <h2>Rp 35.000,00</h2>
                    <div class="button_paket">
                        <a href="{{ 'detail_paket' }}"><button>Detail Paket</button></a>
                        <a href=""><i class='bx bxs-cart-add'></i></a>
                    </div>
                </div>
                <div class="contoh_paket">
                    <img src="image/contoh_paket.png" alt="">
                    <h1>Paket Try Out BUMN 1</h1>
                    <p><span>•</span> Tes Kemampuan Dasar (TKD)</p>
                    <p><span>•</span> Tes Ujian simulasi</p>
                    <p><span>•</span> Tes Logika</p>
                    <p><span>•</span> Paket Soal Lengkap</p>
                    <h2>Rp 35.000,00</h2>
                    <div class="button_paket">
                        <a href="{{ 'detail_paket' }}"><button>Detail Paket</button></a>
                        <a href=""><i class='bx bxs-cart-add'></i></a>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    @include('template.footer')
@endsection
