<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Inventaris;
use App\Models\Buku;

class InventarisController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = $request->get('query'); // Ambil parameter query dari URL

        if ($query) {
            // Jika ada parameter query, lakukan pencarian
            $invent = Inventaris::where('Judul_Buku', 'LIKE', "%$query%")
                            ->orWhere('Sumber', 'LIKE', "%$query%")
                            ->orWhere('Penerima', 'LIKE', "%$query%")
                            ->get();
        } else {
            // Jika tidak ada parameter query, ambil semua data
            $invent = Inventaris::all();
        }

        // Kirim data ke view
        return view('admin.inventaris', compact('invent'));
    }

    public function create(Request $request)
    {
        // Validasi input
        $request->validate([
            'sumber' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'pengarang' => 'required|string',
            'judul' => 'required|string',
            'kategori' => 'required|in:Agama,Ilmu Terapan,Ilmu Murni,Filsafat,Karya Umum,Ilmu Sosial,Bahasa,Kesusasteraan,Sejarah & Geografis,Seni dan Olahraga',
            'penerbit' => 'required|string',
            'tempat_terbit' => 'required|string',
            'tahun_terbit' => 'required|digits:4',
            'jumlah' => 'required|integer',
            'penerima' => 'required|string',
            'gambar_sampul' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Menyimpan gambar jika ada
        if ($request->hasFile('gambar_sampul')) {
            $imageName = time() . '.' . $request->gambar_sampul->extension();
            $request->gambar_sampul->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        // Simpan data ke tabel inventaris
        Inventaris::create([
            'sumber' => $request->sumber,
            'tanggal_masuk' => $request->tanggal_masuk,
            'pengarang' => $request->pengarang,
            'judul_buku' => $request->judul,
            'kategori' => $request->kategori,
            'penerbit' => $request->penerbit,
            'tempat_terbit' => $request->tempat_terbit,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah' => $request->jumlah,
            'penerima' => $request->penerima,
            'gambar_sampul' => $imageName,
        ]);

        // Cek apakah buku sudah ada di tabel buku
        $buku = Buku::where('judul', $request->judul)->first();

        if ($buku) {
            // Jika buku sudah ada, tambahkan jumlah_stok
            $buku->increment('jumlah_stok', $request->jumlah);
        } else {
            // Jika buku belum ada, tambahkan data baru ke tabel buku
            Buku::create([
                'judul' => $request->judul,
                'penulis' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'kategori' => $request->kategori,
                'deskripsi' => 'Deskripsi belum tersedia', // Bisa diganti sesuai kebutuhan
                'jumlah_stok' => $request->jumlah,
                'jumlah_terpinjam' => 0,
                'gambar_sampul' => $imageName,
            ]);
        }

        return redirect()->route('admin.inventaris')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'sumber' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'pengarang' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tempat_terbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'jumlah' => 'required|integer',
            'penerima' => 'required|string|max:255',
            'kategori' => 'required|string',
            'gambar_sampul' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Ambil ID dari request dan cari inventaris yang sesuai
        $id = $request->input('id');
        $inventaris = Inventaris::findOrFail($id);

        // Update data
        $inventaris->sumber = $validated['sumber'];
        $inventaris->tanggal_masuk = $validated['tanggal_masuk'];
        $inventaris->pengarang = $validated['pengarang'];
        $inventaris->judul_buku = $validated['judul'];
        $inventaris->penerbit = $validated['penerbit'];
        $inventaris->tempat_terbit = $validated['tempat_terbit'];
        $inventaris->tahun_terbit = $validated['tahun_terbit'];
        $inventaris->jumlah = $validated['jumlah'];
        $inventaris->penerima = $validated['penerima'];
        $inventaris->kategori = $validated['kategori'];

        // Proses upload gambar jika ada file
        if ($request->hasFile('gambar_sampul')) {
            // Hapus gambar lama jika ada
            if ($inventaris->gambar_sampul) {
                \Storage::delete($inventaris->gambar_sampul);
            }
            // Simpan gambar baru
            $inventaris->gambar_sampul = $request->file('gambar_sampul')->store('public/images');
        }

        $inventaris->save();

        // Redirect ke halaman inventaris dengan pesan sukses
        return redirect()->route('admin.inventaris')->with('success', 'Data inventaris berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Debug untuk melihat data yang ditemukan
        $invent = Inventaris::where('ID', $id)->first();

        // Jika data ditemukan, lakukan debug
        if ($invent) {
            $invent->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->withErrors(['ID' => 'Data tidak ditemukan!']);
        }
    }

}
