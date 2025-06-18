<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route Basic
Route::get('/about', function() {
    return 'ini halaman about';
});
Route::get('/profile', function() {
    return view('profile');
});

// Route Parameter(ditandai dengan {})
Route::get('produk/{NamaProduk}', function($a){
    return 'Saya Membeli <b>' . $a . '</b>';
});

Route::get('beli/{barang}/{jumlah}', function($a, $b){
    return view('beli', compact('a', 'b'));
});

// Route Opsional Parameter 
Route::get('kategori/{namakategori?}', function ($nama = null){
    if($nama){
        return 'Anda Memilih Kategori: ' . $nama;
    } else {
        return 'Anda belum memilih kategori';
    }
});

Route::get('promo/{barang?}/{kode?}', function($barang = null, $kode = null){
    return view('barang', compact('barang', 'kode'));
});