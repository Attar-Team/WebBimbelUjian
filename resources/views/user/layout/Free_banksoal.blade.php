@extends('template.header')
@section('title', 'BumnMuda. | Freebank_Soal')
@section('content')
    <div class="freebank">
        <h1 style="margin-top: 100px">Paket Tryout 1 kategori BUMN</h1>
        <h2>Free Bank Soal</h2>
        <div class="garis"></div>
        <div class="paket_freebank"><span>Paket Pdf</span> </div>

        @foreach ($package_details as $package_detail)
            <?php
            $course = $package_detail->course->name ?? '';
            ?>
            @if ($course != '')
                @if ($package_detail->course->type == 'file pdf')
                    <div class="satupaket_pdf">
                        <i class='bx bxs-circle'></i>
                        <div class="kotak_pdf">
                            <i class='bx bxs-file-pdf'></i>
                            <div class="download_kotak">
                                <div class="keterangan_pdf">
                                    <h1 class="m-0">{{ $package_detail->course->name }}</h1>
                                    <h2 class="m-0">241 Halaman</h2>
                                    <p class="m-0">23 MB</p>
                                </div>
                                <a href="{{ asset("storage/".$package_detail->course->url) }}" target="blank"><i class='bx bxs-download'></i></a>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @endforeach

        <script type="text/javascript">

        </script>

    </div>
@endsection
