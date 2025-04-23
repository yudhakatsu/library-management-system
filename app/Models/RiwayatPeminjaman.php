<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'riwayat_peminjaman';
    protected $fillable = ['id', 'nis', 'nama', 'Judul_Buku', 'Tanggal_Pinjam', 'Tanggal_Kembali', 'Status'];
}
