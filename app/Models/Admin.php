<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin'; // Sesuaikan nama tabel dengan yang ada di database
    protected $fillable = ['ID', 'username', 'password']; // Kolom yang bisa diisi
}