@extends('template.header')
@section('title', 'Bumn Muda | Detail Paket')
@section('content')

@php
    use App\Util\FormatRupiah;
    $total = $package->price - $package->discount;
@endphp
    <div class="detail_paket">
        <div class="detail_paketkiri">
            <img src="{{ asset("storage/$package->photo") }}" alt="">

            {{-- <h1>Mentor</h1>
            <div class="mentor">
                <img src="/image/zarif1.png" alt="">
                <div class="nama_mentor">
                    <h2>Admin</h2>
                    <p>Pelatih Bumn dan CPNS</p>
                </div>
            </div> --}}
            <h1>Deskripsi</h1>
            <p>{!! $package->description !!}</p>

            <h1>Materi</h1>
            
            <div class="accordion mb-5" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button border d-flex" style="justify-content: space-between" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      Latian soal / Quiz <small style="position: absolute;right: 55px;">{{ $countExam }} Quiz</small>
                    </button>
                    
                  </h2>
                  <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body p-0">
                        @foreach ($package->packageDetail as $item)
                        <?php
                        $courseName = $item->course->name ?? '';
                        $examName = $item->exam->name ?? '';
                        ?>
                        
                        @if ($examName != '')
                        <div class="d-flex w-100 px-3 py-2" style="justify-content: space-between;align-items: center;border-bottom: 1px solid #ddd">
                            <div class="name">
                                <p class="m-0"><i class="fa-solid fa-pen-to-square"></i> {{ $item->exam->name }}</p>
                            </div>
    
                            <div class="acces w-10">
                                <div class="row">
                                    <div class="col-sm-10">
                                        Akses pengerjaan
                                    </div>
                                    <div class="col-sm-2">
                                        {{ $item->amount_acces }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10 ">
                                        Akses Pembahasan
                                    </div>
                                    <div class="col-sm-2">
                                        @if ($item->is_review == 1)
                                        ✔
                                        @else
                                        -
                                        @endif
                                    </div>
                               
                                </div>
                            </div>
                          </div>
                        @endif
                    @endforeach
              

                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                      Video Pembelajaran<small style="position: absolute;right: 55px;">{{ $countVideo }} Video</small>
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        @foreach ($package->packageDetail as $item)
                        <?php
                        $courseName = $item->course->name ?? '';
                        $examName = $item->exam->name ?? '';
                        ?>
                        @if ($courseName != '')
                            @if ($item->course->type == "videos")  
                            <p><span>•</span> {{ $item->course->name }}</p>
                            @endif
                        @endif
                    @endforeach
                        
                    </div>
                </div>
            </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                      Bank soal <small style="position: absolute;right: 55px;">{{ $countBankSoal }} Bank Soal</small>
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        @foreach ($package->packageDetail as $item)
                        <?php
                        $courseName = $item->course->name ?? '';
                        $examName = $item->exam->name ?? '';
                        ?>
                        @if ($courseName != '')
                            @if ($item->course->type == "file pdf")  
                            <p><span>•</span> {{ $item->course->name }}</p>
                            @endif
                        @endif
                    @endforeach
                    </div>
                  </div>
                </div>
              </div>

        </div>
        <div class="detail_paketkanan_terbang">

        </div>
        <div class="detail_paketkanan">
            <h1>{{ $package->name }}</h1>
            <h2>Rp {{ FormatRupiah::Rupiah($total) }}</h2>
            <p>Rp{{ FormatRupiah::Rupiah($package->price) }}</p>
            <div class="atasisi_detailpaket mt-3">
                <div class="isi_detailpaket">
                    <i class='bx bx-play'></i>
                    <h3>{{ $countVideo }} Video Pembelajaran</h3>
                </div>
                <div class="isi_detailpaket">
                    <i class='bx bx-file'></i>
                    <h3>{{ $countExam }} Latihan soal</h3>
                </div>
                <div class="isi_detailpaket">
                    <i class='bx bx-task'></i>
                    <h3>{{ $countBankSoal }} Bank Soal</h3>
                </div>
            </div>

            <button class="masuk_keranjang">Masukkan keranjang</button>
            <a href="/order/{{ $package->id }}"><button class="beli_detailpaket">Beli Paket</button></a>
        </div>
    </div>
    <script src="/js/home.js"></script>
    <script src="/js/detail_paket.js"></script>
    @include('template.footer')
@endsection
