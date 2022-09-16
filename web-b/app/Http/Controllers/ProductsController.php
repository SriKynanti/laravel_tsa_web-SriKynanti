<?php

namespace App\Http\Controllers;
use App\Models\Products;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all(); // Mengambil semua isi tabel
        $posts = Products::orderBy('id', 'desc')->paginate(6);
        return view('products.index', compact('products'));
    }
    
    public function create()
    {
        return view('products.create');
    }

    public function store()
    {
        $product = new Products;
        $product->nama = request('namaproduk');
        $product->deskripsi = request('deskripsiproduk');
        $product->gambar = request()->file('formFile')->store('public/images');
        $product->save();

        return redirect()->route('products.index')
        ->with('success', 'Produk Berhasil Ditambahkan');
    }
}
