<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Buku;

class BukuController extends Controller
{
    //
    public function koleksibuku(Request $request)
    {
        $query = $request->get('query');

        if ($query) {
            // Jika ada parameter query, lakukan pencarian
            $data = Buku::where('judul', 'LIKE', "%$query%")
                            ->orWhere('penulis', 'LIKE', "%$query%")
                            ->orWhere('kategori', 'LIKE', "%$query%")
                            ->get();
        } else {
            // Jika tidak ada parameter query, ambil semua data
            $data = Buku::all();
        }

        return view('admin.koleksi-buku', compact('data'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|date_format:Y',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'jumlah_stok' => 'required|integer|min:0',
            'gambar_sampul' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Cari data buku berdasarkan ID
        $id = $request->input('id');
        $book = Buku::findOrFail($id);

        // Update data buku
        $book->judul = $validatedData['judul'];
        $book->penulis = $validatedData['penulis'];
        $book->penerbit = $validatedData['penerbit'];
        $book->tahun_terbit = $validatedData['tahun_terbit'];
        $book->kategori = $validatedData['kategori'] ?? null;
        $book->deskripsi = $validatedData['deskripsi'] ?? null;
        $book->jumlah_stok = $validatedData['jumlah_stok'];

        // Proses upload gambar jika ada file
        if ($request->hasFile('gambar_sampul')) {
            // Hapus gambar lama jika ada
            if ($book->gambar_sampul) {
                \Storage::delete($book->gambar_sampul);
            }

            $filename = 'gambar_sampul_' . $book->id . '.' . $request->file('gambar_sampul')->extension();
            // Simpan gambar baru
            $book->gambar_sampul = $request->file('gambar_sampul')->storeAs('public/images', $filename);
        }

        // Simpan perubahan
        $book->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('admin.koleksi')->with('success', 'Data buku berhasil diperbarui!');
    }

    public function delete($id)
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
