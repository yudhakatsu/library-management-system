<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\DB;
use App\Models\Buku;

class SiswaController extends Controller
{
    // Menampilkan halaman login user
    public function loginUserForm()
    {
        return view('login');
    }

    // Proses login user
    public function loginProcess(Request $request)
    {
        $credentials = $request->only('nis', 'password');

        // Cek apakah NIS dan password cocok dengan data di tabel user
        $user = User::where('NIS', $credentials['nis'])->first();

        if ($user && $user->Password === $credentials['password']) {
            // Simpan data session untuk menandakan user telah login
            session(['user' => $user]);

            // Redirect ke halaman utama user
            return redirect()->route('user.home');
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors(['message' => 'NIS atau password salah'])->withInput();
    }

    // Halaman utama user
    public function homeUser()
    {
        // Cek apakah user sudah login
        if (!session('user')) {
            return redirect()->route('user.login');
        }

        $totalkoleksi = Buku::count();
        $totaleksemplar = Buku::sum('jumlah_stok');
        $anggota = user::count(); 

        return view('homepage', compact('totalkoleksi', 'totaleksemplar', 'anggota'));
    }

    public function index(Request $request)
    {
        $query = $request->get('query'); // Ambil parameter query dari URL

        if ($query) {
            // Jika ada parameter query, lakukan pencarian
            $dataSiswa = User::where('NIS', 'LIKE', "%$query%")
                            ->orWhere('Nama', 'LIKE', "%$query%")
                            ->get();
        } else {
            // Jika tidak ada parameter query, ambil semua data
            $dataSiswa = User::all();
        }

        // Kirim data ke view
        return view('admin.data-siswa', compact('dataSiswa'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        // Query untuk mencari berdasarkan NIS atau Nama
        $dataSiswa = User::where('NIS', 'LIKE', "%$query%")
                        ->orWhere('Nama', 'LIKE', "%$query%")
                        ->get();

        return response()->json($dataSiswa);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nis' => 'required|integer',
            'editJenisKelamin' => 'required|in:Laki-Laki,Perempuan',
            'programKeahlian' => 'nullable|string|max:100',
            'kelas' => 'nullable|string|max:50',
        ]);

        user::create([
            'Nama' => $request->nama,
            'NIS' => $request->nis,
            'Jenis_Kelamin' => $request->editJenisKelamin,
            'Program_Keahlian' => $request->programKeahlian,
            'Kelas' => $request->kelas,
            'Password' => 'siswa123',
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    // Controller SiswaController.php
    public function update(Request $request)
    {
        // Validasi
        $request->validate([
            'nama' => 'required|string|max:100',
            'nis' => 'required|integer',
            'editJenisKelamin' => 'required|in:Laki-Laki,Perempuan',
            'programKeahlian' => 'nullable|string|max:100',
            'kelas' => 'nullable|string|max:50',
        ]);
    
        // Cari siswa berdasarkan NIS
        $siswa = user::where('NIS', $request->nis)->first();
    
        if (!$siswa) {
            return redirect()->back()->withErrors(['nis' => 'Data tidak ditemukan']);
        }
    
        // Lakukan update
        $siswa->update([
            'Nama' => $request->nama,
            'Jenis_Kelamin' => $request->editJenisKelamin,
            'Program_Keahlian' => $request->programKeahlian,
            'Kelas' => $request->kelas,
        ]);
    
        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }
    

    public function delete($nis)
    {
        $siswa = user::where('NIS', $nis)->first();
        if ($siswa) {
            $siswa->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->withErrors(['nis' => 'Data tidak ditemukan!']);
        }
    }

}