<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\RiwayatKunjungan;
use App\Models\Inventaris;
use App\Models\RiwayatPeminjaman;
use App\Models\Buku;
use App\Models\User;

use Carbon\Carbon;
use PDF; // Import DomPDF facade

class LaporanController extends Controller
{
    // Fungsi cetak kunjungan
    public function cetakKunjungan(Request $request)
    {
        // Ambil bulan dari request, jika tidak ada gunakan bulan saat ini
        $bulan = $request->get('bulan', date('m'));

        // Ambil data dari database berdasarkan bulan
        $siswa = RiwayatKunjungan::where('Status', 'siswa')
            ->whereMonth('Tanggal', $bulan)
            ->get();

        $tamu = RiwayatKunjungan::where('Status', 'tamu')
            ->whereMonth('Tanggal', $bulan)
            ->get();

        // Data yang akan dikirim ke view
        $data = [
            'siswa' => $siswa,
            'tamu' => $tamu,
            'bulan' => $bulan
        ];

        // Generate PDF
        $pdf = PDF::loadView('pdf.kunjungan', $data);

        // Kembalikan PDF untuk diunduh
        return $pdf->download('laporan_kunjungan.pdf');
    }

    public function cetakInventaris(Request $request)
    {
        $bulan = $request->get('bulan', date('m'));

        $data = Inventaris::whereMonth('Tanggal_Masuk', $bulan)->get();
        $pdf = PDF::loadView('pdf.inventaris', ['data' => $data]);
        return $pdf -> download('laporan_inventaris.pdf');
    }

    public function cetakPeminjaman(Request $request)
    {
        $bulan = $request->get('bulan', date('m'));

        $data = RiwayatPeminjaman::whereMonth('Tanggal_Pinjam', $bulan)->get();
        $pdf = PDF::loadView('pdf.peminjaman', ['data' => $data]);
        return $pdf -> download('data_riwayat-peminjaman.pdf');
    }

    public function generatePDF()
    {
        // Ambil data dari model-model
        $data1 =  RiwayatKunjungan::where('status', 'siswa')->get();
        $data1_1 = RiwayatKunjungan::where('status', 'tamu')->get();
        $data2 = Inventaris::all();
        $data3 = RiwayatPeminjaman::all();

        // Load view untuk tiga tabel dan render HTML
        $pdfContent = view('pdf.pdf', compact('data1', 'data1_1', 'data2', 'data3'))->render();

        // Generate PDF dari konten HTML
        $pdf = PDF::loadHTML($pdfContent);

        // Return file PDF ke browser
        return $pdf->download('Laporan_akhir_tahun.pdf');
    }

    public function countall(Request $request)
    {
        $bulanKunjungan = $request->input('bulanKunjungan', date('m'));
        $bulanPeminjaman = $request->input('bulanPeminjaman', date('m'));
        $bulanPemasukan = $request->input('bulanInventaris', date('m'));
        // Hitung jumlah data pada masing-masing tabel
        $jumlahKunjungan = RiwayatKunjungan::whereMonth('tanggal', $bulanKunjungan)->count();
        $jumlahPeminjaman = RiwayatPeminjaman::whereMonth('tanggal_pinjam', $bulanPeminjaman)->count();
        $jumlahPemasukan = Inventaris::whereMonth('tanggal_masuk', $bulanPemasukan)->count();

        // Kirim data ke view
        return view('admin.laporan', compact('jumlahKunjungan', 'jumlahPeminjaman', 'jumlahPemasukan', 'bulanKunjungan', 'bulanPeminjaman', 'bulanPemasukan'));
    }

    public function dashboard()
    {
        // Hitung total koleksi buku
        $totalBuku = Buku::count();

        // Hitung total anggota
        $totalAnggota = User::count();

        // Hitung kunjungan hari ini
        $kunjunganHariIni = RiwayatKunjungan::whereDate('Tanggal', Carbon::today())->count();

        // Kirim data ke view
        return view('admin.home', compact('totalBuku', 'totalAnggota', 'kunjunganHariIni'));
    }
}
