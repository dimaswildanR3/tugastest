<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JumlahSampah;
use App\jenis_sampah;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class JumlahSampahController extends Controller
{
    public function index()
    {
        // Mendapatkan semua data jumlah sampah
        $datas = JumlahSampah::all();

        // Mengirim data ke view atau melakukan operasi lainnya
        return view('jumlah_sampah.index', ['datas' => $datas]);
    }

    public function create()
    {
        // Mendapatkan semua jenis sampah untuk formulir
        $jumlahsampah = JumlahSampah::all();
        $datas = jenis_sampah::all();

        // Menampilkan formulir untuk membuat jumlah sampah baru
        return view('jumlah_sampah.create', ['jumlahsampah' => $jumlahsampah,'datas'=>$datas]);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $jumlahSampah = new JumlahSampah;
             $jumlahSampah->jumlah = $request->input('jumlah');
             $jumlahSampah->jenis_sampah_id  = $request->input('jenis_sampah_id'); 
             $jumlah = \App\jenis_sampah::find($request->input('jenis_sampah_id'));
             $jumlahSampah->sampah = $jumlah->jenis_sampah;           
             $jumlahSampah->user_id = Auth::id();
             $jumlahSampah->save();
        // Membuat data jumlah sampah baru
        // JumlahSampah::create($request->all());

        // Redirect ke halaman index atau halaman lainnya
        return redirect()->route('jumlah_sampah')
            ->with('success', 'Jumlah Sampah berhasil ditambahkan!');
    }


    public function edit($id) {
        $jumlahSampah = JumlahSampah::find($id);
        $datas = jenis_sampah::all();
        return view('jumlah_sampah.edit', compact('jumlahSampah', 'datas'));
    }

    public function update(Request $request, $id) {
        $jumlahSampah = JumlahSampah::find($id);
         $jumlahSampah->jumlah = $request->input('jumlah');
         $jumlahSampah->jenis_sampah_id = $request->input('jenis_sampah_id');
         $jumlah = \App\jenis_sampah::find($request->input('jenis_sampah_id'));
         $jumlahSampah->sampah = $jumlah->jenis_sampah;
         $jumlahSampah->user_id = Auth::id();
             $jumlahSampah->save();

        return redirect()->route('jumlah_sampah')->with('sukses', 'Data jumlahSampah Berhasil Diubah');
    }

    public function destroy($id) {
        $datas = JumlahSampah::find($id);
        $datas->delete();
        
        return redirect()->route('jumlah_sampah')->with('sukses', 'Data jumlahSampah Berhasil Dihapus');
    }

}