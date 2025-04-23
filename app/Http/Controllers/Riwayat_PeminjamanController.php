<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPeminjaman;
use App\Models\User;
use App\Models\Peminjaman;

class Riwayat_PeminjamanController extends Controller
{
    public function riwayatsiswa()
    {
        // Cek apakah user sudah login
        if (!session('user')) {
            return redirect()->route('user.login');
        }

        $user = session('user');

        $nis = $user->NIS;

        $riwayatPeminjaman = Peminjaman::where('nis', $nis)->get();

        return view('riwayat_peminjaman', compact('riwayatPeminjaman'));
    }

    public function showRiwayat(Request $request)
    {
        $query = $request->get('query');

        if ($query){
            $data = RiwayatPeminjaman::where('NIS', 'LIKE', "%$query%")
                                        ->orWhere('Nama', 'LIKE', "%$query%")
                                        ->orWhere('Status', 'LIKE', "%$query%")
                                        ->get();
        } else {
            // Ambil semua data dari tabel `riwayatpeminjaman`
            $data = RiwayatPeminjaman::all();
        }

        // Kirim data ke view
        return view('admin.riwayat-peminjaman', compact('data'));
    }
}
