<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    echo "Selamat Datang";
});

Route::get('/about', function () {
    echo "NIM = 1941720063 <br> NAMA = Sri Kynanti <br> KELAS = TSA Web-B";
});

Route::get('/articles/1', function () {
    echo "Halaman Artikel dengan id 1 (Sri Kynanti)";
});

Route::get('/articles/{id}', function ($id) {
    echo "Halaman Artikel dengan ID ".$id;
});