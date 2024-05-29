@extends('admin.template.template-admin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <p class="col-sm-3 r">Nama</p>
                        <p class="col-sm-2">{{ $package->name }}</p>
                    </div>

                    <div class="row mb-2">
                        <p class="col-sm-3 r">Tipe</p>
                        <p class="col-sm-2">{{ $package->type }}</p>
                    </div>

                    <div class="row mb-2">
                        <p class="col-sm-3 r">Kategori</p>
                        <p class="col-sm-2">{{ $package->category }}</p>
                    </div>

                    <div class="row mb-2">
                        <p class="col-sm-3 r">Harga</p>
                        <p class="col-sm-2">{{ $package->price }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-3 r">Diskon</p>
                        <p class="col-sm-2">{{ $package->discount }}</p>
                    </div>
                </div>

                <div class="card-body border">
                    <h2>Isi paket</h2>
                    <div class="row mb-2">
                        <h4 class="col-sm-2">Name</h4>
                        <h4 class="col-sm-1">Tipe</h4>
                        <h4 class="col-sm-3">Pengaturan</h4>
                        <h4 class="col-sm-3">Content</h4>
                    </div>

                    @foreach ($package->packageDetail as $item)
                    @if ($item->exam_id != null)     
                    <div class="row mb-2 p-2" style="border-top: 1px solid #ddd;border-bottom: 1px solid #ddd">                        
                        <p class="col-sm-2">{{ $package->name }}</p>
                        <p class="col-sm-1">Ujian</p>
                        <div class="col-sm-3">
                            <p class="m-0">Akses : {{ $item->amount_acces }}</p>
                            <p class="m-0">Review : {{ $item->is_review = 1 ? "✔" : "--" }}</p>
                        </div>
                        <p class="col-sm-3">--</p>
                    </div>
                    @endif
                
                    @endforeach

                    @foreach ($course as $item)
                    @if ($item->type == "videos")     
                    <div class="row mb-2 p-2" style="border-top: 1px solid #ddd;border-bottom: 1px solid #ddd">                        
                        <p class="col-sm-2">{{ $item->name }}</p>
                        <p class="col-sm-1">{{ $item->type }}</p>
                        <p class="col-sm-3 m-0">--</p>
                        <div class="col-sm-3">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$item->url}}?si=lwPLHe2GY21-kXWl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>   
                    </div>
                    @endif
                    @if ($item->type == "file pdf")     
                    <div class="row mb-2 p-2" style="border-top: 1px solid #ddd;border-bottom: 1px solid #ddd">                        
                        <p class="col-sm-2">{{ $item->name }}</p>
                        <p class="col-sm-1">{{ $item->type }}</p>
                        <p class="col-sm-3 m-0">--</p>
                        <div class="col-sm-3">
                            @php
                                $finalUrl = basename($item->url);
                            @endphp
                            <embed src="/show-pdf/{{$finalUrl}}" width="550px" height="500px" type="text/pdf">"
                           
                            </div>    
                    </div>
                    @endif
                    @endforeach


                </div>
            </div>
        </div>

    </div>
@endsection
