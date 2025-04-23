<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Riwayat_PeminjamanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DataTamuController;
use App\Http\Controllers\Riwayat_KunjunganController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Halaman login User
Route::get('/login', [SiswaController::class, 'loginUserForm'])->name('login');
Route::post('/login', [SiswaController::class, 'loginProcess'])->name('user.submit');


// Halaman profil
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

// Riwayat peminjaman
Route::get('/riwayat-peminjaman', [BorrowController::class, 'history'])->name('riwayat-peminjaman')->middleware('auth');

// Logout
Route::post('/logout', [AuthController::class, 'logoutuser'])->name('logout');

// User routes
Route::middleware(['user'])->group(function () {
    Route::get('/homepage', [SiswaController::class, 'homeUser'])->name('user.home');
});
// ===============================

// routes/web.php
Route::get('/', [AuthController::class, 'statistic'])->name('homepage');

Route::get('/layanan-reservasi', function () {
    return view('layanan-reservasi');
})->name('layanan-reservasi');

// routes/web.php
Route::get('/sirkulasi', function () {
    return view('sirkulasi');
})->name('sirkulasi');

// routes/web.php
Route::get('/layanan-sirkulasi', function () {
    return view('layanan-sirkulasi');
})->name('layanan-sirkulasi');

// routes/web.php
Route::get('/peminjaman-buku', [LayananController::class, 'daftarBuku'])->name('peminjaman-buku');
Route::get('/koleksi-buku', [LayananController::class, 'DaftarBuku1'])->name('peminjaman-buku1');

// routes/web.php
Route::get('/buku/{id}', [LayananController::class, 'detailBuku'])->name('detail-buku');

// routes/web.php
Route::get('/peminjaman/{id}', [PeminjamanController::class, 'showForm'])->name('form-peminjaman');
Route::post('/peminjaman/store', [PeminjamanController::class, 'createsiswa'])->name('peminjaman-store');

Route::get('/riwayat', [Riwayat_PeminjamanController::class, 'riwayatsiswa'])->name('riwayat-peminjaman');

// routes/web.php
Route::get('/peminjaman_sukses', function () {
    return view('peminjaman_sukses');
})->name('peminjaman_sukses');

Route::get('/peminjaman/sukses', [LayananController::class, 'peminjamanSukses'])->name('peminjaman_success');

// routes/web.php
Route::get('/profil', function () {
    return view('profil');
})->name('profil');
Route::get('/profil-index', [ProfileController::class, 'index'])->name('profil');


// Admin
Route::get('/admin/inventaris', function () {
    return view('admin.inventaris');
});

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('login.submit');

// Route::get('/admin/home', [AuthController::class, 'home'])->name('admin.home'); // Hanya dapat diakses jika login
// Rute untuk admin
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
});

// data siswa-admin
Route::get('/admin/data-siswa', [SiswaController::class, 'index'])->name('data-siswa');
Route::post('/admin/update-siswa', [SiswaController::class, 'update'])->name('admin.update');
Route::delete('/admin/delete-siswa/{nis}', [SiswaController::class, 'delete'])->name('siswa.destroy');
Route::post('/admin/add-users', [SiswaController::class, 'create'])->name('users.store');
Route::get('/admin/search-siswa', [SiswaController::class, 'search'])->name('search.siswa');

//data tamu-admin
Route::get('/admin/data-tamu', [DataTamuController::class, 'index'])->name('tamu');

Route::get('/admin/peminjaman', [PeminjamanController::class, 'peminjamanadmin'])->name('admin.peminjaman');
Route::post('/admin/peminjaman/store', [PeminjamanController::class, 'createadmin'])->name('admin.peminjaman.store');
Route::post('/admin/peminjaman/update-status', [PeminjamanController::class, 'updateStatus'])->name('updateStatus');
Route::put('/admin/peminjaman/update', [PeminjamanController::class, 'update'])->name('admin.peminjaman.update');
Route::delete('/admin/peminjaman/hapus/{id}', [PeminjamanController::class, 'delete'])->name('admin.peminjaman.destroy');
Route::get('/admin/peminjaman/get-users', [PeminjamanController::class, 'getUsers']);
Route::get('/admin/peminjaman/search-buku', [PeminjamanController::class, 'searchBuku']);

Route::get('/admin/riwayat-peminjaman', [Riwayat_PeminjamanController::class, 'showRiwayat'])->name('admin.riwayat-peminjaman');

Route::get('/admin/inventaris', [InventarisController::class, 'index'])->name('admin.inventaris');
Route::post('/admin/inventaris/store', [InventarisController::class, 'create'])->name('inventaris.store');
Route::patch('/admin/inventaris/update', [InventarisController::class, 'update'])->name('invent.update');
Route::delete('/admin/delete-invent/{id}', [InventarisController::class, 'delete'])->name('invent.destroy');

Route::get('/admin/koleksi-buku', [BukuController::class, 'koleksibuku'])->name('admin.koleksi');
Route::patch('/admin/koleksi-buku/update', [BukuController::class, 'update'])->name('admin.koleksi-update');
Route::delete('/admin/delete-buku/{id}', [BukuController::class, 'delete'])->name('admin.koleksi-deleted');

//Admin reservasi
Route::get('/admin/reservasi', [Riwayat_KunjunganController::class, 'view'])->name('admin.reservasi');
Route::get('/admin/riwayat-kunjungan', [Riwayat_KunjunganController::class, 'find'])->name('admin.riwayat-kunjungan');
Route::post('/admin/reservasi/store', [Riwayat_KunjunganController::class, 'create'])->name('admin.reservasi.store');
Route::get('/admin/reservasi/get-users', [Riwayat_KunjunganController::class, 'getUsers']);

// Route::get('/admin/laporan', function () {
//     return view('admin.laporan'); // Path ke file Blade
// })->name('admin.laporan');

Route::get('/admin/laporan', [LaporanController::class, 'countall'])->name('admin.laporan');

// cetak PDF
Route::get('/cetak/kunjungan', [LaporanController::class, 'cetakKunjungan'])->name('cetak.kunjungan');
Route::get('/cetak/inventaris', [LaporanController::class, 'cetakInventaris'])->name('cetak.inventaris');
Route::get('/cetak/peminjaman', [LaporanController::class, 'cetakPeminjaman'])->name('cetak.peminjaman');
Route::get('/cetak/laporan', [LaporanController::class, 'generatePDF'])->name('export.pdf');