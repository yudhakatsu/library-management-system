<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    // Jika nama tabel tidak menggunakan konvensi plural
    protected $table = 'inventaris';

    protected $fillable = [
        'sumber', 'tanggal_masuk', 'pengarang', 'judul_buku', 'kategori', 'penerbit', 
        'tempat_terbit', 'tahun_terbit', 'jumlah', 'penerima', 'gambar_sampul'
    ];

    public $timestamps = false;
    protected $primaryKey = 'ID';
}
