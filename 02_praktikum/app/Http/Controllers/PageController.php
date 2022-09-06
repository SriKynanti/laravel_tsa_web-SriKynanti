<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return 'Selamat Datang';
    }

    public function about(){
        return 'NIM 1941720063 NAMA Sri Kynanti Kelas TSA Web-B';
    }

    public function articles($id){
        return 'Halaman artikel dengan ID '.$id;
    }
}
