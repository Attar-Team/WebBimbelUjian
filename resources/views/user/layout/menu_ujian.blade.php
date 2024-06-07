@extends('template.header')
@section('title', 'BumnMuda. | Ujian')
@section('content')
    <div class="freebank">
        <h1 style="margin-top: 100px">Paket Tryout 1 kategori BUMN</h1>
        <h2>Tryout/ Latihan Soal</h2>
        <div class="garis"></div>
        <div class="paket_freebank"><span>Soal Ujian</span> </div>

        @foreach ($package_details as $package_detail)
            @if ($package_detail->exam_id != '')
               <a href="{{ route('startQuiz', $package_detail->id) }}">
                <div class="satupaket_pdf">
                    <i class='bx bxs-circle'></i>
                    <div class="kotak_pdf">
                        <i><img src="{{ asset('img/icon_test.png') }}" alt=""></i>
                        <div class="download_kotak">
                            <div class="keterangan_pdf">
                                <h1 class="m-0">{{ $package_detail->exam->name }}</h1>
                                <h2 class="m-0">{{ $package_detail->answer_count }} / {{ $package_detail->amount_acces }}
                                    Diakses</h2>
                                <p class="m-0"> -</p>
                            </div>
                            <img width="50px" class="m-2" src="{{ asset('img/icon_go.png') }}" alt="">
                        </div>
                    </div>
                </div>
               </a>
            @endif
        @endforeach


        <script type="text/javascript"></script>

    </div>
@endsection
