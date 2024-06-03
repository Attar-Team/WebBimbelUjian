@extends('template.header')
@section('title', 'BumnMuda. | Ujian')
@section('content')
<div class="freebank">
    <h1 style="margin-top: 100px">Paket Tryout 1 kategori BUMN</h1>
    <h2>Tryout/ Latihan Soal</h2>
    <div class="garis"></div>
    <div class="paket_freebank"><span>Soal Ujian</span> </div>

                <div class="satupaket_pdf">
                    <i class='bx bxs-circle'></i>
                    <div class="kotak_pdf">
                        <i><img src="{{ asset('img/icon_test.png') }}" alt=""></i>
                        <div class="download_kotak">
                            <div class="keterangan_pdf">
                                <h1 class="m-0">judul ujian</h1>
                                <h2 class="m-0">0 / 4 Diakses</h2>
                                <p class="m-0"> -</p>
                            </div>
                            <a href="" target="blank"><img src="{{ asset('img/icon_go.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>

    <script type="text/javascript">

    </script>

</div>
@endsection