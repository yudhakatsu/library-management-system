<?php

namespace App\Http\Controllers;

use App\Models\RiwayatKunjungan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DataTamuController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('query');
        if ($query) {
            $dataTamu = RiwayatKunjungan::select('Nama', 'Ket', 'Status', DB::raw('MAX(ID) as ID'))
                                        ->where('Status', 'Tamu')
                                        ->orWhere('Nama', 'LIKE', "%$query%")
                                        ->groupBy('Nama', 'Ket', 'Status') // Kelompokkan berdasarkan kolom yang sesuai
                                        ->get();
        } else {
            // Mengambil data tamu dengan status 'tamu' dan hanya satu entri per nama
            $dataTamu = RiwayatKunjungan::where('Status', 'Tamu')
                                        ->select('Nama', 'Ket', 'Status', DB::raw('MAX(ID) as ID')) // Ambil entri dengan ID tertinggi per nama
                                        ->groupBy('Nama', 'Ket', 'Status') // Kelompokkan berdasarkan nama
                                        ->get();
        }
        

        // Mengirim data tamu ke view
        return view('admin.tamu', compact('dataTamu'));
    }
}
