<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        return 'Selamat Datang';
    }

    public function about() {
        return "Nama : Sri Kynanti, NIM : 1941720063";
    }

    public function articles($id) {
        return "Ini adalah halaman artikel dengan ID " .$id;
    }
}
