@php
    $numberQuestion = $detailQuestion->nomor_soal;
    $maxNumberQuestion = count($question);
    $optionAnswerId = $answer->question_detail_id ?? 0;

@endphp
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body style="background-color: #f1f1f1"  oncontextmenu=" return disableRightClick()">
    {{-- <script>
        function disableRightClick() 
{ 
alert("Hayoloo mau ngapainnn 🤣"); 
return false; 
}  --}}
    </script>
    <nav>
        <h3>Bumn<span>Muda</span>.</h3>
        <h2>Ujian Materi Logika</h2>

        <div class="d-flex gap-3" style="align-items: center">
            <p class="m-0">Zarif</p>
            <i class="fa-solid fa-user"></i>
        </div>
    </nav>


    <div class="quiz">
        <div class="soal">
            <div class="header-soal">
                <h3>Soal No . <span>{{ $numberQuestion }}</span></h3>
                <p>{!! $detailQuestion->question !!}</p>
                <div class="line"></div>

                @foreach ($optionQuestion as $item)
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" value="{{ $item->id }}" <?= $optionAnswerId == $item->id ? 'checked' : ''?> name="content_answer" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {!! $item->content_answer !!}
                            </label>
                        </div>

                @endforeach
            </div>

            <div class="foot-soal">

                {{-- pengecekan jika nomor soal pada posisi pertama --}}

                @if ($numberQuestion == 1)
                <a href="{{ $no = $numberQuestion - 1 }}" class="btn btn-dark disabled"><i class="fa-solid fa-caret-left"></i> Soal Sebelumnya</a>
                <div class="ragu-ragu d-inline-block p-2 rounded" style="background-color: #FFF500">
                    <input class="form-check-input doubtful" type="checkbox" <?= in_array($numberQuestion, $doubtfulAnswer) ? 'checked' : '' ?> value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Ragu - Ragu
                    </label>
                </div>
                <a href="{{ $no = $numberQuestion + 1 }}" class="btn btn-dark">Soal Selanjutnya <i class="fa-solid fa-caret-right"></i></a>
                @endif

                {{-- pengecekan jika nomor soal pada posisi terakhir --}}

                @if ($numberQuestion == $maxNumberQuestion)
                
                <a href="{{ $no = $numberQuestion - 1 }}" class="btn btn-dark"><i class="fa-solid fa-caret-left"></i> Soal Sebelumnya</a>
                <div class="ragu-ragu d-inline-block p-2 rounded" style="background-color: #FFF500">
                    <input class="form-check-input doubtful" type="checkbox" <?= in_array($numberQuestion, $doubtfulAnswer) ? 'checked' : '' ?> value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Ragu - Ragu
                    </label>
                </div>
                <a href="/quiz/confirm" class="btn btn-dark ">Finish <i class="fa-solid fa-caret-right"></i></a>
                @endif

                {{-- pengecekan jika nomor soal pada posisi lebih dari 1 dan kurang dari banyak soal --}}

                @if ( $numberQuestion > 1 && $maxNumberQuestion > $numberQuestion)
                <a href="{{ $no = $numberQuestion - 1 }}" class="btn btn-dark"><i class="fa-solid fa-caret-left"></i> Soal Sebelumnya</a>
                <div class="ragu-ragu d-inline-block p-2 rounded" style="background-color: #FFF500">
                    <input class="form-check-input doubtful" type="checkbox" <?= in_array($numberQuestion, $doubtfulAnswer) ? 'checked' : '' ?> value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Ragu - Ragu
                    </label>
                </div>
                <a href="{{ $no = $numberQuestion + 1 }}" class="btn btn-dark">Soal Selanjutnya <i class="fa-solid fa-caret-right"></i></a>
                @endif

            </div>
        </div>

        <div class="info">
            <div class="header-info">
                <h2 id="time">01 : 20 : 20</h2>
                <p class="no-soal">Nomor soal:</p>
                <div class="nomor-soal">

                    @foreach ($question as $key => $item)
                            <div class="box 
                                {{-- memberi warna untuk posisi saat ragu-ragu --}}
                                <?= in_array($item->nomor_soal,$doubtfulAnswer) ? 'ragu-ragu' : ''?>
                                 {{-- memberi warna untuk posisi saat ini --}}
                                 <?= in_array($item->nomor_soal,$doneAnswer) ? 'sudah-terjawab' : ''?>
                                {{-- memberi warna untuk posisi saat ini --}}
                                <?= $numberQuestion == $item->nomor_soal ? 'saat-ini' : ''?>
                                ">
                                <a href="/quiz/{{ $item->nomor_soal }}">{{ $item->nomor_soal }}</a>
                            </div>
                    @endforeach

                </div>
            </div>

            <div class="foot-info">
                <div>
                    <div class="box" >
                        <div class="warna saat-ini"></div>
                        <p>Posisi saat ini</p>
                    </div>
                    <div class="box" >
                        <div class="warna ragu-ragu"></div>
                        <p>Ragu - Ragu</p>
                    </div>
                </div>
                <div>
                    <div class="box" >
                        <div class="warna sudah-terjawab"></div>
                        <p>Sudah Terjawab</p>
                    </div>
                    <div class="box" >
                        <div class="warna"></div>
                        <p>Belum Terjawab</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        var question_id = {{ $detailQuestion->id }}
        var answer_id = {{  Session::get("answerId") }}
        var number_question = {{ $detailQuestion->nomor_soal }}

        $(document).ready(function() {
            ($(":input[type=radio]").click(function() {
                    var question_detail_id = $(":input[type=radio]:checked").val();
                    const data = {
                        question_detail_id: question_detail_id,
                        question_id: question_id,
                        answer_id: answer_id,
                        number_question: number_question
                    }
                    // console.log(data)
                    $.ajax({
                        url: "/api/quiz/answer",
                        method: 'POST',
                        data: data,
                        success(res){
                            console.log(res)
                        },
                        error(err){
                            console.log(err);
                        }
                    })
                }))
        
                ($(".doubtful").click(function() {
                    // alert('asd')
                    const data = {
                        question_id: question_id,
                        answer_id: answer_id
                    }
                    $.ajax({
                        url: "/api/quiz/doubtful",
                        method: 'POST',
                        data: data,
                        success(res){
                            console.log(res)
                        },
                        error(err){
                            console.log(err);
                        }
                    })
                }))
                })


                 // Set the date we're counting down to
var countDownDate = new Date("{{$endTimeExam}}").getTime();
var now = new Date().getTime();

var distance = countDownDate - now;

var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);

// Display the result in the element with id="demo"
document.getElementById("time").innerHTML = hours + " : "
  + minutes + " : " + seconds + "  ";
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="time"
  document.getElementById("time").innerHTML = hours + " : "
  + minutes + " : " + seconds + "  ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);

                </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
