<?php

namespace App\Http\Controllers;
use App\Models\Products;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {

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
    }
}
