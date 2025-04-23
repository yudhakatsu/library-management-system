<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_buku';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'nis',
        'nama',
        'judul_buku',
        'jumlah_buku',
        'tanggal_pinjam',
        'tanggal_kembali',
        'kelas',
        'no_hp',
        'status',
    ];

    public $timestamps = false;
}