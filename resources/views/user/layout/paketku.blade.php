@extends('user.component.sidebar')
@section('title', 'BumnMuda. | paketku')
<link rel="stylesheet" href="{{ asset('css/dashboard_user.css') }}">
@section('tampilan_dashboard')

    <script src="{{ asset('js/dashboard_user.js') }}"></script>

    <div class="menu_user">
        {{-- <h1>Paketku</h1>
    <p>Mempermudah melihat semua paket yang telah anda beli</p> --}}
        <h2>Mari mulai belajar,
            Restu Imam Safii</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita
            eveniet eius velit tempora dolorum </p>
        {{-- <div class="kotak">

    </div> --}}
        <h3>Paket anda</h3>
        <div class="d-flex" style="flex-wrap: wrap;gap: 20px">
            @foreach ($orders as $order)
            {{-- @dd($order->order_details); --}}
            @foreach($order->order_details as $order_detail)
                <div class="contoh_pakets">
                    <img src="{{ asset('image/contoh_paket.png') }}" alt="">
                   {{-- @dd($order_detail->package) --}}

                    <h1 class="mt-2">{{ $order_detail->package->name }}</h1>
                        @foreach ($order_detail->package->packageDetail as $key => $detail) 
                            <?php
                            $courseName = $detail->course->name ?? '';
                            $examName = $detail->exam->name ?? '';
                            ?>
                            @if ($courseName != '')
                                <p><span>•</span> {{ $detail->course->name }}</p>
                            @endif
                            @if ($examName != '')
                                <p><span>•</span> {{ $detail->exam->name }}</p>
                            @endif
                            

                            @if ($key == 4)
                            @break
                        @endif
                    @endforeach
                    <div class="keterangan_paket">
                        <i class='bx bx-check'></i>
                        <h2>Telah dibeli</h2>
                    </div>
                    <div class="button_paket">
                        <a href="{{ route('user_isipaket',$order_detail->package->id) }}"><button>Lanjutkan belajar</button></a>
                        
                    </div>
                </div>
                @endforeach
        @endforeach
    </div>
</div>

@endsection
