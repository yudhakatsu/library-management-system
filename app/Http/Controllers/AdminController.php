<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Admin;
use App\Models\Buku;
use App\Models\User;
use App\Models\RiwayatKunjungan;

class AdminController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Cek apakah username dan password cocok dengan data di tabel admin
        $admin = Admin::where('username', $credentials['username'])
            ->where('password', $credentials['password']) // Tidak menggunakan Hash::check jika password tidak ter-enkripsi
            ->first();

        if ($admin) {
            // Simpan data session untuk menandakan bahwa admin telah login
            session(['admin' => $admin]);

            // Arahkan admin ke halaman admin home
            return redirect()->route('admin.home');
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors(['message' => 'Invalid credentials']);
    }

    // Halaman utama admin
    public function home()
    {
        // Cek apakah pengguna sudah login
        if (!session('admin')) {
            return redirect()->route('admin.login');
        }

        // Hitung total koleksi buku
        $totalBuku = Buku::count();
        // Hitung total anggota
        $totalAnggota = User::count();
        // Hitung kunjungan hari ini
        $kunjunganHariIni = RiwayatKunjungan::whereDate('Tanggal', Carbon::today())->count(); 


        // Hitung kunjungan per bulan untuk tahun ini
        $tahun = date('Y');
        $kunjunganPerBulan = DB::table('riwayat_kunjungan')
            ->selectRaw('MONTH(Tanggal) as bulan, COUNT(*) as total')
            ->whereYear('Tanggal', $tahun)
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        // Buat array dengan nilai default 0 untuk setiap bulan
        $dataKunjungan = array_fill(1, 12, 0); // [1 => 0, 2 => 0, ..., 12 => 0]
        foreach ($kunjunganPerBulan as $bulan => $total) {
            $dataKunjungan[$bulan] = $total;
        }

        // Kirim data ke view
        return view('admin.home', [
            'totalBuku' => $totalBuku,
            'totalAnggota' => $totalAnggota,
            'kunjunganHariIni' => $kunjunganHariIni,
            'dataKunjungan' => json_encode(array_values($dataKunjungan))
        ]);
    }

    // Logout pengguna
    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('admin.login');
    }
}
