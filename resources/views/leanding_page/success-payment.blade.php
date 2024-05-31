<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <div class=" mt-5">

        {{-- <div class="border"> --}}
            
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
            
            <dotlottie-player src="https://lottie.host/f6a8346b-7b3c-4277-bfdd-b90da4230ba3/LOjIWZAuzQ.json" background="transparent" speed="1" style="width: 400px; height: 400px;margin: auto" loop autoplay></dotlottie-player>
        {{-- </div> --}}

        <h1 class="text-center">Pembayaran Berhasil</h1>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            const myTimeout = setTimeout(time, 3000);
            function time(){
                window.location.assign("http://127.0.0.1:8000/")
		    }

            myTimeout();

        });
    </script>
</body>

</html>
