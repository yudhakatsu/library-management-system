<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LayananController extends Controller
{
    // Controller
    public function sirkulasi()
    {
        return view('layanan.sirkulasi');
    }

    public function daftarBuku(Request $request)
    {
        // Mengambil kategori yang dipilih, jika ada
        $kategori = $request->input('kategori', 'Semua'); // Default kategori adalah 'Semua'

        // Menampilkan buku berdasarkan kategori yang dipilih
        if ($kategori == 'Semua') {
            $bukus = Buku::all(); // Ambil semua buku
        } else {
            $bukus = Buku::where('kategori', $kategori)->get(); // Filter berdasarkan kategori
        }

        // Mengirimkan data ke view
        return view('peminjaman_buku', compact('bukus', 'kategori'));
    }

    public function DaftarBuku1(Request $request)
    {
        $kategori = $request->input('kategori', 'Semua'); // Default: Semua
        $bukus = Buku::when($kategori !== 'Semua', function ($query) use ($kategori) {
            return $query->where('kategori', $kategori);
        })->paginate(10);

        return view('peminjaman_buku', compact('bukus', 'kategori'));
    }

    public function detailBuku($id)
    {
        // Ambil data buku berdasarkan id
        $buku = Buku::findOrFail($id); // Mengambil data buku berdasarkan id, atau 404 jika tidak ditemukan

        return view('detail_buku', compact('buku'));
    }

    public function peminjamanBuku()
    {
        $buku = [
            [
                'judul' => 'Desain Media Interaktif (C3) Kelas XII',
                'penulis' => 'Rudi Nurchayo, S.Kom',
                'cover' => 'cover1.jpg',
                'ketersediaan' => 21,
            ],
            [
                'judul' => 'Akuntansi Keuangan C3 Kelas XI',
                'penulis' => 'Dra.Dwi Harti , M.Pd',
                'cover' => 'cover2.jpg',
                'ketersediaan' => 20,
            ],
            // Tambahkan buku lainnya...
        ];

        return view('layanan.form_peminjaman', compact('buku'));
    }

    public function peminjamanadmin(Request $request)
    {
        $query = $request->get('query'); // Ambil query pencarian

        if ($query) {
            // Jika ada parameter query, lakukan pencarian berdasarkan Nama
            $data = Peminjaman::where('Nama', 'LIKE', "%$query%")->get();
        } else {
            // Jika tidak ada parameter query, ambil semua data
            $data = Peminjaman::all();
        }

        // Mengatur urutan berdasarkan status dan tanggal pinjam terbaru
        $sortedData = $data->sortBy(function ($item) {
            // Menentukan urutan status
            $statusOrder = ['Diajukan' => 1, 'ACC' => 2, 'Dikembalikan' => 3];
            $statusComparison = $statusOrder[$item['Status']] ?? 0; // Default ke 0 jika status tidak ada

            // Mengurutkan berdasarkan status dan tanggal pinjam
            return [$statusComparison, strtotime($item['Tanggal_Pinjam'])];
        });

        return view('admin.peminjaman', ['data' => $sortedData]);
    }

    public function destroy($id)
    {
        // Debug untuk melihat data yang ditemukan
        $invent = Buku::where('id', $id)->first();

        // Jika data ditemukan, lakukan debug
        if ($invent) {
            $invent->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->withErrors(['id' => 'Data tidak ditemukan!']);
        }
    }

}
