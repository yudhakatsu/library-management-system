<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Admin;
use App\Models\User;
use App\Models\Buku;
use App\Models\RiwayatKunjungan;

use Carbon\Carbon;

class AuthController extends Controller
{
    // ==========================
    // AUTHENTICATION FOR USERS
    // ==========================

    public function statistic()
    {
        $totalkoleksi = Buku::count();
        $totaleksemplar = Buku::sum('jumlah_stok');
        $anggota = user::count();
        
        return view('homepage', compact('totalkoleksi', 'totaleksemplar', 'anggota'));
    }

    // Logout user
    public function logoutUser()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
