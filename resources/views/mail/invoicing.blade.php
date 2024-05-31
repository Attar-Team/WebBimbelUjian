<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- <title>Document</title> --}}
</head>
<body>
  <h3>Hallo {{ $name }}</h3>
  <p>Terima Kasih atas pembelian kursus</p>
  @foreach ($name_package as $item)    
  <ul>
    <li>Paket</li>
    <li>{{ $item['name_packag'] }}</li>
  </ul>
  @endforeach
  <ul>
    <li>Harga</li>
    <li>{{ $gross_amount }}</li>
  </ul>
</body>
</html>