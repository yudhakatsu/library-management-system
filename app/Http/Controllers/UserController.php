<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Menampilkan halaman profil pengguna
    public function profile()
    {
        $user = user::user(); // Mendapatkan data pengguna yang sedang login
        return view('user.profile', compact('user'));
    }
}
