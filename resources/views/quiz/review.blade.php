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

    <div class="review">

        <div class="desc">
            <div class="header-desc">
                <h2>Test Kemampuan Dasar</h2>
                <div class="grade">
                    <p class="m-0">Nilai :</p>
                    <h3 class="m-0">{{ $answer->grade }} <span>/100</span></h3>
                </div>
            </div>

            <div class="footer-desc">
                <div class="jml-soal">
                    <h4 class="m-0">Soal : {{ count($questionDetail) }}</h4>
                </div>
                <div class="jml-benar">
                    <h4 class="m-0">Benar : {{ $jumlahBenar }}</h4>
                </div>
                <div class="jml-salah">
                    <h4 class="m-0">Salah : {{ $jumlahSalah }}</h4>
                </div>
            </div>
        </div>

        <div class="content">
            @foreach ($questionDetail as $item)
                <div class="box <?= $item->is_correct == 1 ? 'bg-benar' : 'bg-salah' ?> ">
                    <p>{{ $item->number_question }}. {{ $item->question->question }}</p>
                    <ol>
                        @if ($item->is_correct == 1)
                            @foreach ($item->questionDetail_questionId as $option)
                                <li class="<?= $item->question_detail_id == $option->id ? 'jawaban-benar' : '' ?> ">
                                    {{ $option->content_answer }}</li>
                            @endforeach
                        @else
                            @foreach ($item->questionDetail_questionId as $option)
                                <li
                                    class="<?= $option->id == $item->question_detail_id ? 'jawaban-salah' : '' ?> <?= $option->correct_answer == 1 ? 'jawaban-benar' : '' ?> ">
                                    {{ $option->content_answer }}</li>
                            @endforeach
                        @endif

                    </ol>

                    <div class="line"></div>
                    <h5>Pembahasan</h5>
                    <p>{{ $item->question->review }}</p>
                </div>
            @endforeach

        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
