@extends('template.header')
@section('title', 'BumnMuda. | isi paketku')
@section('content')
    <script src="{{ asset('js/home.js') }}"></script>
    <div class="isi_paket">
        <h1>Paket Tryout 1 Kategori BUMN</h1>
        <h2>Wah ada calon BUMN Muda nih...</h2>
        <p>Ayo segera pelajari apa aja sih yang dipersiapkan agar bisa jadi bumn muda</p>
        <h3>Materi</h3>
        <div class="materi_isipaket">
            
            <div class="satumateri_isipaket">
                
                <div class="gambar_isipaket"><img src="" alt=""></div>
                <h2>video pembelajaran</h2>
                <div class="progres_isipaket">
                    <p>progres kamu</p>
                    <p>40%</p>
                </div>
                <progress id="file" value="32" max="100"> 32% </progress>
            </div>
            <div class="satumateri_isipaket">
                
                <div class="gambar_isipaket"><img src="" alt=""></div>
                <h2>Try Out/ latihan soal</h2>
                <div class="progres_isipaket">
                    <p>progres kamu</p>
                    <p>40%</p>
                </div>
                <progress id="file" value="32" max="100"> 32% </progress>
            </div>
            <div class="satumateri_isipaket">
                
                <div class="gambar_isipaket"><img src="" alt=""></div>
                <h2>Core Value BUMN</h2>
                <div class="progres_isipaket">
                    <p>progres kamu</p>
                    <p>40%</p>
                </div>
                <progress id="file" value="32" max="100"> 32% </progress>
            </div>
            <a href="{{ route('user_freebank_soal') }}">
            <div class="satumateri_isipaket">
                
                <div class="gambar_isipaket"><img src="" alt=""></div>
                <h2>Free Bank soal </h2>
                <div class="progres_isipaket">
                    <p>progres kamu</p>
                    <p>40%</p>
                </div>
                <progress id="file" value="32" max="100"> 32% </progress>
            </div>
            </a>
        </div>
        
        <div class="deskripsi">
            <h3>Deskripsi</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, ullam? Illo corrupti rem tenetur temporibus debitis, perferendis nihil expedita architecto! Id eos eligendi saepe voluptas cumque mollitia ex aut inventore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum cumque distinctio deserunt, optio quos laudantium dolor voluptatibus velit voluptatem quis illum! Pariatur, ea doloribus explicabo eos iste possimus mollitia nihil. Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit consectetur quaerat quasi dolorem voluptas, consequatur provident magni laborum repudiandae quam? Nemo, error? Asperiores praesentium repellendus minima, fugit obcaecati quis nemo.</p>
            </div>
    </div>

    
@endsection