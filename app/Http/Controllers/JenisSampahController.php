<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenis_sampah;

class JenisSampahController extends Controller
{
    
    public function index()
    {
        // Mendapatkan semua data jenis sampah
        $datas = jenis_sampah::all();

        // Mengirim data ke view atau melakukan operasi lainnya
        return view('jenis_sampah.index', ['datas' => $datas]);
    }

    public function create()
    {
        // Menampilkan formulir untuk membuat jenis sampah baru
        return view('jenis_sampah.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
    //    $jenisSampah = new jenis_sampah;
    //         $jenisSampah->jenis_sampah = $request->input('jenis_sampah');
    //         $jenisSampah->harga  = $request->input('harga');
        

        // Membuat data jenis sampah baru
        jenis_sampah::create($request->all());

        // Redirect ke halaman index atau halaman lainnya
        return redirect()->route('jenis_sampah')
            ->with('success', 'Jenis Sampah berhasil ditambahkan!');
    }

    
public function show($id) {
        $jenisSampah = jenis_sampah::find($id);
        return view('JenisSampah.show', compact('JenisSampah'));
    }

    public function edit($id) {
        $JenisSampah = jenis_sampah::find($id);
        return view('JenisSampah.edit', compact('JenisSampah'));
    }

    public function update(Request $request, $id) {
        $JenisSampah = jenis_sampah::find($id);
         $jenisSampah->jenis_sampah = $request->input('jenis_sampah');
            $jenisSampah->harga  = $request->input('harga'); 
        $JenisSampah->save();
        
        return redirect()->route('JenisSampah.index')->with('sukses', 'Data JenisSampah Berhasil Diubah');
    }

    public function destroy($id) {
        $JenisSampah = jenis_sampah::find($id);
        $JenisSampah->delete();
        
        return redirect()->route('jenis_sampah')->with('sukses', 'Data JenisSampah Berhasil Dihapus');
    }
}