<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman; // Model untuk tabel peminjaman
use App\Models\Buku;       // Model untuk tabel buku
use App\Models\RiwayatPeminjaman;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    // Menampilkan form peminjaman
    public function showForm(Request $request, $id_buku)
    {
        // Periksa apakah session user ada
        if (!session()->has('user')) {
            return redirect()->route('login')->withErrors(['message' => 'Silakan login terlebih dahulu.']);
        }

        // Ambil data user dari session
        $user = session('user');

        // Ambil data buku berdasarkan ID
        $buku = Buku::find($id_buku);

        if (!$buku) {
            return redirect()->back()->with('error', 'Buku tidak ditemukan.');
        }

        return view('form_peminjaman', [
            'user' => $user,
            'buku' => $buku,
        ]);
    }

    // Menyimpan data peminjaman
    public function createsiswa(Request $request)
    {
        // Periksa apakah session user ada
        if (!session()->has('user')) {
            return redirect()->route('login')->withErrors(['message' => 'Silakan login terlebih dahulu.']);
        }

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'judul' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'kelas' => 'required|string|max:50',
            'no_hp' => 'required|string|max:13',
        ]);

        // Ambil data user dari session
        $user = session('user');
        
        try {
            // Proses simpan data
            Peminjaman::create([
                'nis' => $user->NIS,
                'nama' => $validated['nama'],
                'judul_buku' => $validated['judul'],
                'jumlah_buku' => $validated['jumlah'],
                'tanggal_pinjam' => $validated['tanggal_pinjam'],
                'tanggal_kembali' => $validated['tanggal_kembali'],
                'kelas' => $validated['kelas'],
                'no_hp' => $validated['no_hp'],
                'status' => 'Diajukan',
            ]);
                
            return redirect()->back()->with('success', 'Peminjaman berhasil disimpan.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan peminjaman.');
        }
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

    public function createadmin(Request $request)
    {
        \Log::info('Data Input:', $request->all());

        // Validasi data
        $validated = $request->validate([
            'nis' => 'required|string|max:10',
            'nama' => 'required|string|max:100',
            'judul_buku' => 'required|string|max:100',
            'jumlah_buku' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
            'kelas' => 'required|string|max:50',
            'no_hp' => 'required|digits_between:1,13',
        ]);

        // Tambahkan status secara otomatis
        $validated['status'] = 'ACC';

        // Simpan data ke tabel peminjaman
        $peminjaman = Peminjaman::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    public function updateStatus(Request $request)
    {
        // Validasi data
        $request->validate([
            'id' => 'required|exists:peminjaman_buku,ID',
            'status' => 'required|in:Diajukan,ACC,Dikembalikan',
        ]);

        try {
            // Ambil data dari tabel peminjaman_buku berdasarkan ID
            $peminjaman = DB::table('peminjaman_buku')->where('ID', $request->id)->first();

            if (!$peminjaman) {
                return redirect()->back()->withErrors(['id' => 'Data tidak ditemukan']);
            }

            // Update status di tabel peminjaman_buku
            $affectedRows = DB::table('peminjaman_buku')
                ->where('ID', $request->id)
                ->update(['Status' => $request->status]);

            if ($affectedRows > 0) {
                // Kondisi jika status berubah menjadi 'ACC', tambahkan data ke tabel riwayatpeminjaman
                if ($request->status === 'ACC') {
                    DB::table('riwayatpeminjaman')->insert([
                        'id' => $peminjaman->ID,
                        'nis' => $peminjaman->NIS,
                        'nama' => $peminjaman->Nama,
                        'Judul_Buku' => $peminjaman->Judul_Buku,
                        'Tanggal_Pinjam' => $peminjaman->Tanggal_Pinjam,
                        'Tanggal_Kembali' => $peminjaman->Tanggal_Kembali,
                        'Status' => 'Sedang dipinjam',
                    ]);
                }

                // Kondisi jika status berubah menjadi 'Dikembalikan', periksa tanggal
                if ($request->status === 'Dikembalikan') {
                    // Jika tanggal kembali sudah lewat atau sama dengan Tanggal_Kembali
                    $tanggalKembali = strtotime($peminjaman->Tanggal_Kembali);
                    $tanggalSekarang = strtotime(now());

                    $statusRiwayat = ($tanggalSekarang >= $tanggalKembali) ? 'Selesai' : 'Terlambat';

                    // Update status pada riwayatpeminjaman
                    DB::table('riwayatpeminjaman')
                        ->where('id', $peminjaman->ID)
                        ->update(['Status' => $statusRiwayat]);
                }

                return redirect()->back()->with('success', 'Status berhasil diperbarui dan data riwayat ditambahkan!');
            } else {
                return redirect()->back()->withErrors(['id' => 'Data gagal diperbarui']);
            }
        } catch (\Exception $e) {
            // Tangani error jika terjadi
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'id' => 'required|exists:peminjaman_buku,id',
            'nis' => 'required|string',
            'nama' => 'required|string',
            'judul_buku' => 'required|string',
            'jumlah_buku' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'kelas' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        // Temukan data berdasarkan ID
        $peminjaman = Peminjaman::where('ID', $validated['id']);

        // Update data
        $peminjaman->update($validated);

        return redirect()->back()->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Cari data berdasarkan ID
        $peminjaman = Peminjaman::find($id);
        if ($peminjaman) {
            $peminjaman->delete();
            return redirect()->route('admin.peminjaman')->with('success', 'Data berhasil dihapus');
        }

        return redirect()->route('admin.peminjaman')->with('error', 'Data tidak ditemukan');
    }

    public function getUsers(Request $request)
    {
        $query = $request->get('query');

        // Ambil data NIS, Nama, dan Kelas sesuai query
        $users = User::where('nis', 'LIKE', "%$query%")
                    ->orWhere('nama', 'LIKE', "%$query%")
                    ->get(['nis', 'nama', 'kelas']);

        return response()->json($users);
    }

    public function searchBuku(Request $request)
    {
        $query = $request->get('query'); // Ambil query pencarian

        // Query untuk mencari judul buku yang sesuai
        $buku = Buku::where('judul', 'LIKE', "%$query%")->get(['judul']); // Ambil judul buku

        return response()->json($buku); // Kembalikan sebagai response JSON
    }
}
