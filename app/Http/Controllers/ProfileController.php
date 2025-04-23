<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // Debug untuk cek isi session
        // dd(session()->all());

        // Ambil data user dari session atau autentikasi
        $user = session('user'); // Jika menggunakan session
        // $user = Auth::user(); // Jika menggunakan autentikasi Laravel

        return view('profil.index', compact('user'));
    }
    //
}
