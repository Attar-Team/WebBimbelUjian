<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bumn Muda</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config("midtrans.client_key") }}"></script>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail_paket.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex py-3 px-5" style="justify-content: space-between;align-items: center">
        <a href="{{ route('home') }}" class="logo">Bumn<span>Muda.</span></a>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
    </div>

    <div class="d-flex gap-5" style="justify-content:space-between; padding-inline: 100px">
        <div class="card p-3 w-100">
            <h1>Nama Paket </h1>
            <div class="atasisi_detailpaket mt-3">
                <div class="isi_detailpaket">
                    <i class='bx bx-play'></i>
                    <h3>1 Video Pembelajaran</h3>
                </div>
                <div class="isi_detailpaket">
                    <i class='bx bx-file'></i>
                    <h3>1 Latihan soal</h3>
                </div>
                <div class="isi_detailpaket">
                    <i class='bx bx-task'></i>
                    <h3>1 Bank Soal</h3>
                </div>
            </div>
        </div>
        <input type="hidden" value="{{ $package->id }}" id="id">
        <div class="card py-3 px-5 w-100">
            <h1 class="mb-3">Ringkasan</h1>
            <div class="d-flex" style="justify-content:space-between">
                <div class="" style="font-weight: 700">
                    Harga Asli
                </div>
                <div class="" style="font-weight: 700">
                    Rp 150.000,00
                </div>
            </div>

            <button id="bayar" class="btn btn-info">Bayar</button>
        </div>
    </div>

    <div id="snap-container"></div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bayar').click(function() {
            
                var id = $('#id').val();
                const data = {
                    id: id,
                }
                var token = "";
                $.ajax({
                    url: "/api/getToken",
                    method: "post",
                    data: data,
                    success(res) {
                        console.log(res.token)
                        token = res.token;
                        window.snap.pay(token, {
                            onSuccess: function(result) {
                                /* You may add your own implementation here */
                                alert("payment success!");
                                console.log(result);
                            },
                            onPending: function(result) {
                                /* You may add your own implementation here */
                                alert("wating your payment!");
                                console.log(result);
                            },
                            onError: function(result) {
                                /* You may add your own implementation here */
                                alert("payment failed!");
                                console.log(result);
                            },
                            onClose: function() {
                                /* You may add your own implementation here */
                                alert(
                                    'you closed the popup without finishing the payment');
                            }
                        })
                    },
                    error(err) {
                        console.log(res)
                    }
                })

            })
        });
    </script>

</body>

</html>
