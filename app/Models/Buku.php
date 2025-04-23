<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Jika nama tabel tidak mengikuti konvensi plural dari model, Anda dapat mendefinisikannya
    protected $table = 'buku';  // Sesuaikan dengan nama tabel Anda

    // Definisikan kolom yang dapat diisi
    protected $fillable = [
        'id', 'judul', 'penulis', 'penerbit', 'tahun_terbit',
        'kategori', 'deskripsi', 'jumlah_stok', 'jumlah_pinjam',
        'gambar_sampul',
    ];

    public $timestamps = false;
}
