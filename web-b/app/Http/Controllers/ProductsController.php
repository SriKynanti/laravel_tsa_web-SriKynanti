<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
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

    public function show($id)
    {
        $products = Products::find($id);
        return view('products.detail', ['products' => $products]);
    }


    public function edit($id)
    {
        $products = Products::find($id);
        return view('products.edit', ['products' => $products]);
    }

    public function update(Request $request, $id)
    {
        $products = Products::find($id);

        $products->nama = $request->nama;
        $products->deskripsi = $request->deskripsi;

        if ($products->gambar && file_exists(storage_path('app/public/' . $products->gambar))) {
            \Storage::delete('public/' . $products->gambar);
        }

        $image_name = $request->file('image')->store('images', 'public');
        $products->gambar = $image_name;

        $products->save();
        
        return redirect()->route('products.index')
        ->with('success', 'Produk Berhasil Dirubah');
    }


    public function destroy($id)
    {
        Products::find($id)->delete();
        return redirect()->route('products.index')
            ->with('success', 'Produk Berhasil Dihapus');
    }
}
