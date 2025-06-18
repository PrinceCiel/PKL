<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($barang)
    Promo Untuk {{$barang}} <br>
        @if($kode)
            Dengan kode promo {{$kode}}
        @endif
    @else 
    Semua Promo barang
    @endif
</body>
</html>