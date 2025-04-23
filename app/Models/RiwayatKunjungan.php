<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKunjungan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_kunjungan'; // Nama tabel

    protected $fillable = [
        'status',
        'nis',
        'nama',
        'kelas_jurusan',
        'tanggal',
        'ket',
    ];

    public $timestamps = false; // Nonaktifkan timestamps

    protected $attributes = [
        'nis' => null,
        'nama' => '',
        'kelas_jurusan' => '',
        'tanggal' => '',
        'ket' => '',
    ];
}
