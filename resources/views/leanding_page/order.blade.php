@php
use App\Util\FormatRupiah;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bumn Muda</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail_paket.css') }}">
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex py-3 px-5" style="justify-content: space-between;align-items: center;border-bottom: 2px solid #ddd">
        <a href="{{ route('home') }}" class="logo">Bumn<span>Muda.</span></a>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
    </div>
    <input type="hidden" name="package[]" value="{{ $package->id }}">
  <div class="d-flex gap-5" style="justify-content: center">
    <div class="checkout">
        <h2>Checkout</h2>
        <p style="font-weight: bold">Order detail</p>
        <div class="order-details">
            <div class="course-info">
                <img src="{{ asset('storage/'.$package->photo) }}" width="200px" alt="Kelas BUMN">
                <div class="course-text">
                    <h3>{{ $package->name }}</h3>
                    <p>{!! $package->description !!}</p>
                    
                </div>
            </div>
            <ul>
                <li><i class='bx bx-play'></i> {{ $countVideo }}  Video Pembelajaran</li>
                <li><i class='bx bx-task'></i> {{ $countExam }}  7 Simulasi Ujian</li>
                <li><i class='bx bx-file'></i> {{ $countBankSoal }}  File bank soal</li>
            </ul>
        </div>

    </div>
    <div class="summary">
        <h2>Ringkasan</h2>  
        <div class="summary-details">
            <div class="summary-item">
                <span>Harga Asli</span>
                <span>Rp{{ FormatRupiah::Rupiah($package->price) }}</span>
            </div>
            <div class="summary-item">
                <span>Diskon</span>
                <span>Rp{{ FormatRupiah::Rupiah($package->discount ) }}</span>
            </div>
            <div class="summary-total">
                <span>Jumlah Bayar</span>
                <span>Rp{{ FormatRupiah::Rupiah($package->price - $package->discount ) }}</span>
            </div>
            <button id="bayar" type="button" class="checkout-btn">Selesaikan Checkout</button>
        </div>
    </div>
  </div>

    <div id="snap-container"></div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bayar').click(function() {
                // Buat array kosong untuk menyimpan nilai-nilai
                var packageValues = [];

                // Iterasi melalui setiap elemen input tersembunyi dengan nama 'package[]'
                $('input[name="package[]"]').each(function() {
                    // Tambahkan nilai dari input tersebut ke dalam array
                    packageValues.push($(this).val());
                });
                const data = {
                    package_id: packageValues,
                }
                var token = "";
                $.ajax({
                    url: "/api/getToken",
                    method: "post",
                    data: data,
                    success(res) {
                        console.log(res.res)
                        console.log(res.token)
                        token = res.token;
                        window.snap.pay(token, {
                            onSuccess: function(result) {
                                /* You may add your own implementation here */
                                window.location.assign("http://127.0.0.1:8000/success-payment")
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
                                    'you closed the popup without finishing the payment'
                                    );
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
