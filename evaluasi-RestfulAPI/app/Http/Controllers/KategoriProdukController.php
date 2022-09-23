<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriProduk;

class KategoriProdukController extends Controller
{

    public function __construct(){
         $this->middleware('auth');
     }

    public function index()
    {
        //
        $data_kategori = KategoriProduk::simplePaginate(10);
        return view('kategori.index', compact('data_kategori'));

    }

    public function create()
    {
        //
        $data_kategori = KategoriProduk::all();
        return view('kategori.create', compact('data_kategori'));
        
        //return view('kategori.create');
    }

    public function store(Request $request)
    {
        //dekalrasi variabel
        $kategori = new KategoriProduk;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return back()->with('success','Kategori berhasil di simpan'); 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $kategori = KategoriProduk::find($id);
        return view('kategori.edit',compact('kategori','id'));
    }

    public function update(Request $request, $id)
    {
        //
        $kategori = KategoriProduk::find($id);

        $this->validate(request(),[
            'nama_kategori' =>'required'
        ]);
        $kategori->nama_kategori = $request->get('nama_kategori');
        $kategori->save();
        return redirect('kategori')->with('success','Kategori berhasil di update');

    }

    public function destroy($id)
    {
        //fungsi untuk menghapus data
        $kategori = KategoriProduk::find($id);
        $kategori->delete();
        return redirect('kategori')->with('success','data berhasil di hapus'); 
    }
}
