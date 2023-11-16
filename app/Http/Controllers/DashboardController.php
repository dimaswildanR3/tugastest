<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\TotalSampah;
use App\JumlahSampah;

class DashboardController extends Controller
{
    public function index(User $pengguna)
    {

       
        $data_admin = \App\User::where('role', "admin")->get();
        $transactions = TotalSampah::all();

        // Statistik Sampah Terbanyak per Kategori
        $data = JumlahSampah::all();
        return view('/dashboard', compact('data_admin', 'data','transactions'));
    }
    

    public function siswadashboard(User $pengguna, $id)
    {
        $pesdik = \App\Pesdik::where('id', $id)->get();
        $id_pesdik_login = $pesdik->first();

        $data_login = \App\Login::orderByRaw('created_at DESC')->limit(20)->get();
        $data_admin = \App\User::where('role', "admin")->get();
        $data_petugas = \App\Tendik::all();
        $data_pengumuman = \App\Pengumuman::orderByRaw('created_at DESC')->limit(5)->get();
        return view('dashboard', compact('data_admin', 'data_login', 'data_pengumuman', 'data_petugas', 'id_pesdik_login'));
    }
}
