<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('quiz/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body oncontextmenu=" return false" style="background-color: #f1f1f1">
    <nav>
        <h3>Bumn<span>Muda</span>.</h3>

        <div class="d-flex gap-3" style="align-items: center">
            <p class="m-0">Zarif</p>
            <i class="fa-solid fa-user"></i>
        </div>
    </nav>

    <div class="start">
        <h2>Tes Kemampuan Dasar (TKD)</h2>
        <div class="body-start">
            <img src="{{ asset('quiz/image/image 3.png') }}" alt="">
            <div class="desc">
                <ul>
                    <li>Soal</li>
                    <li>: 4 Soal</li>
                </ul>
                <ul>
                    <li>Jangka Waktu</li>
                    <li>: 2 jam</li>
                </ul>
                <ul>
                    <li>Jenis Soal</li>
                    <li>: Pilihan ganda</li>
                </ul>

                <div class="cont">
                    <div class="cont-header">
                        <p class="m-0">Deskripsi</p>
                        <p class="m-0">Nilai</p>
                        <p class="m-0">Action</p>
                    </div>
                    
                    @foreach ($data as $item)
                    @if ($item->status == "not finished")
                    @if (Session::get("is_start"))
                    <div class="cont-body">
                        <div>
                            <p class="status">Belum Selesai</p>
                            <p class="m-0">Selesai pada -</p>
                        </div>
                        <p class="m-0" style="font-weight: 500;font-size: 25px">---</p>
                        <a href="/quiz/1" class="btn btn-warning">Lanjutkan mengeerjakan</a>
                    </div>
                   
                    @endif
                 
                    @else
                    <div class="cont-body">
                        <div>
                            <p class="btn btn-success">Selesai</p>
                            <p class="m-0">Selesai pada {{ $item->updated_at }}</p>
                        </div>
                        <p class="m-0" style="font-weight: 500;font-size: 25px">{{ $item->grade }}</p>
                        <a href="/quiz/review/{{$item->id}}" class="btn btn-success">Pembahasan</a>
                    </div>
                    @endif
                   
                   @endforeach

                    <?php
                        $amountAccess = 3;
                        $doneAnswer = count($data);
                    ?>
                    @for($i = 1; $i <= ($amountAccess-$doneAnswer); $i++)
                    <div class="cont-body">
                        <div>
                            <p class="status">Belum Selesai</p>
                            <p class="m-0">Selesai pada -</p>
                        </div>
                       
                        <div>
                            ---
                        </div>
                        <div style="border" >
                            <form style="display: inline-block;width: 100%" action="/quiz/start/1" method="post">
                                @csrf
                                <button class="btn-attempt">Attempt Quiz</button>
                            </form>
                        </div>
                    </div>
                    @endfor 
                </div>

                {{-- @isset(Session::get('is_start') && $)
                    
                @endisset 

                <form action="/quiz/start/1" method="post">
                    @csrf
                    <button class="btn-attempt">Attempt Quiz</button>
                </form> --}}

            </div>
        </div>

        {{-- <div class="peraturan">
            <h3>Deskripsi</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates nulla et itaque consectetur magnam natus veritatis, eos maiores sed blanditiis voluptate eligendi ullam atque accusantium quo quae! Corporis, veniam non?</p>
        </div> --}}
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
