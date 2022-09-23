<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriProduk;

class ApiKategoriProdukController extends Controller
{

    public function index()
    {
        //
        $data_kategori = KategoriProduk::all()->toArray();
        return $data_kategori;
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
public function destroy($id)
    {
        //
    }
}
