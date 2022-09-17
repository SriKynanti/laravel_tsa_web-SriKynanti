<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {

        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images', 'public');
        }

        $product = new Products;
        $product->nama = $request->get('namaproduk');
        $product->deskripsi = $request->get('deskripsiproduk');
        $product->gambar = $image_name;
        $product->save();

        return redirect()->route('products.index')
        ->with('success', 'Produk Berhasil Ditambahkan');
    }

}
