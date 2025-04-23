<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTamu extends Model
{
    use HasFactory;

    // Jika nama tabel tidak menggunakan konvensi plural
    protected $table = 'data_tamu';
}
