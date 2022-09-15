<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with('kelas')->get();
        $paginate = Mahasiswa::orderBy('Nim', 'desc')->paginate(3);
        return view('mahasiswas.index', ['mahasiswa' => $mahasiswas,'paginate' =>$paginate]);
    }

    
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswas.create',['kelas' => $kelas]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
        ]);

        $Mahasiswa = new Mahasiswa;
        $Mahasiswa->nim = $request->get('Nim');
        $Mahasiswa->nama = $request->get('Nama');
        $Mahasiswa->jurusan = $request->get('Jurusan');
        $Mahasiswa->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');

        $Mahasiswa->kelas()->associate($kelas);
        $Mahasiswa->save();

        //fungsi eloquent untuk menambah data
        //Mahasiswa::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    public function show($Nim)
    {
        $mahasiswas = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();
        return view('mahasiswas.detail', ['Mahasiswa' => $mahasiswas]);
    }

    public function edit($Nim)
    {
        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim',$Nim)->first();
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa','kelas'));
    }

    public function update(Request $request, $Nim)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
        ]);

        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim',$Nim)->first();
        $Mahasiswa->nim = $request->get('Nim');
        $Mahasiswa->nama = $request->get('Nama');
        $Mahasiswa->jurusan = $request->get('Jurusan');
        $Mahasiswa->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');

        $Mahasiswa->kelas()->associate($kelas);
        $Mahasiswa->save();

        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    

    public function destroy($Nim)
    {
        Mahasiswa::find($Nim)->delete();
        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil Dihapus');
    }
}
