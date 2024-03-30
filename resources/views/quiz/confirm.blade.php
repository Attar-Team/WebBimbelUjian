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


    <div class="confirm">
        
        <h1>Konfirmasi Jawaban</h1>

        @foreach ($data as $item)
        <div class="box">
            <div class="soal">
                <div class="no">No {{ $item['nomor_soal'] }}.</div class="no">
                <p class="m-0">{{ $item['question'] }} </p>
            </div>
            @if ($item['content_answer'] == "")
            <div class="status belum-terjawab">
                <p class="m-0">Belum Terjawab </p>
            </div>
            @else
            <div class="status <?= $item['is_doubtful'] == 1 ? "ragu-ragu" : "sudah-terjawab" ?>">
                <p class="m-0">Sudah Terjawab </p>
            </div>
            @endif

            <div class="jawaban">
                <p class="m-0">{{ $item['content_answer'] != "" ? $item["content_answer"] : "--" }}</p>
            </div>
        </div>
        @endforeach
        
        
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
