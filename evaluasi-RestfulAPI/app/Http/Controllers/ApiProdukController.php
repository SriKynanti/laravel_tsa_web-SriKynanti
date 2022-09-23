<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\KategoriProduk;


class ApiProdukController extends Controller
{
    public function index()
    {
        //untuk menampilkan data
        $data_produk = Produk::with('kategori')->get()->toArray();
        return $data_produk;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function showById($id)
    {   $data_produk = Produk::with('kategori')->where('id_kategori', $id)->get();
        return $data_produk;
        //
    }

    public function showByNama($nama)
    {   
        $data_produk = Produk::with('kategori')->where('nama_produk','LIKE', '%'.$nama. '%')->get();
        return $data_produk;
        //
    }

    public function showByKategori($id)
    {   
        $data_produk = Produk::with('kategori')->where('id_kategori',$id)->get();
        return $data_produk;
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
