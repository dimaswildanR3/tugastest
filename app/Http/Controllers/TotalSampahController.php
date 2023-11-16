<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TotalSampah;
use App\JumlahSampah;
use App\jenis_sampah;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TotalSampahController extends Controller
{
    public function index()
    {
        // Mendapatkan semua data total sampah
        $datas = TotalSampah::all();

        // Mengirim data ke view atau melakukan operasi lainnya
        return view('total_sampah.index', ['datas' => $datas]);
    }

    public function create()
    {
        // Mendapatkan semua jumlah sampah untuk formulir
        $datas = JumlahSampah::all();
        $total = TotalSampah::all();

        // Menampilkan formulir untuk membuat total sampah baru
        return view('total_sampah.create', ['datas' => $datas,'total' => $total]);
    }
    
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $totalSampah = new TotalSampah;
        $woke = $request->input('id_jumlah_sampah');
        $totalSampah->id_jumlah_sampah = $woke;
        // dd($idJumlahSampah);
        $jumlah = \App\JumlahSampah::find($woke);
//   dd($request->input('id_jumlah_sampah'));
        $totalSampah->user_id = $jumlah->user_id;
    
    //    dd($jumlah->jenis_sampah_id);
            $sampah = \App\jenis_sampah::find($jumlah->jenis_sampah_id);
            $totalSampah->hasil = $sampah->harga * $jumlah->jumlah;
            // dd($sampah->harga * $jumlah->jumlah);
    
     
      
        $totalSampah->penyimpangan = $request->input('penyimpangan');
        $totalSampah->status = $request->input('status');
        // dd($totalSampah->status);
    
       
            $totalSampah->save();
       
        return redirect()->route('total_sampah')
            ->with('success', 'Total Sampah berhasil ditambahkan!');
    }
    

      public function show($id) {
        $totalSampah = totalSampah::find($id);
        return view('JenisSampah.show', compact('JenisSampah'));
    }

    public function edit($id) {
        $totalSampah = totalSampah::find($id);
        return view('totalSampah.edit', compact('totalSampah'));
    }

    public function update(Request $request, $id) {
        $totalSampah = TotalSampah::find($id);
         $totalSampah->id_jumlah_sampah = $request->input('id_jumlah_sampah');
             $totalSampah->user_id= $request->input('user_id');
             $totalSampah->hasil = $request->input('hasil');
             $totalSampah->penyimpangan= $request->input('penyimpangan');
             $totalSampah->status = $request->input('status');
          
        $totalSampah->save();
        
        return redirect()->route('totalSampah.index')->with('sukses', 'Data totalSampah Berhasil Diubah');
    }

    public function destroy($id) {
        $totalSampah = TotalSampah::find($id);
        $totalSampah->delete();
        
        return redirect()->route('totalSampah.index')->with('sukses', 'Data totalSampah Berhasil Dihapus');
    }

}

