<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatKunjungan;
use App\Models\User;

class Riwayat_KunjunganController extends Controller
{
    public function view(){
        return view('admin.reservasi');
    }

    public function find(Request $request)
    {
        $query = RiwayatKunjungan::query();

        if ($request->has('tanggal') && $request->tanggal) {
            $query->whereDate('Tanggal', $request->tanggal);
        }

        $dataKunjungan = $query->get();

        return view('admin.riwayat-kunjungan', compact('dataKunjungan'));
    }

    // Method untuk menyimpan data reservasi
    public function create(Request $request)
    {
        $data = $request->validate([
            'status' => 'required',
            'nis' => 'nullable|string',
            'nama' => 'required|string',
            'kelas_jurusan' => 'nullable|string',
            'tanggal' => 'required|date',
            'ket' => 'nullable|string',
        ]);

        RiwayatKunjungan::create($data);

        return redirect()->route('admin.reservasi')->with('success', 'Reservasi berhasil ditambahkan');
    }

    public function getUsers(Request $request)
    {
        $query = $request->get('query');

        // Ambil data NIS, Nama, dan Kelas sesuai query
        $users = User::where('nis', 'LIKE', "%$query%")
                    ->orWhere('nama', 'LIKE', "%$query%")
                    ->get(['nis', 'nama', 'kelas', 'Program_Keahlian']);

        return response()->json($users);
    }
}
