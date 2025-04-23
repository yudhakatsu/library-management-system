<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'siswa';

    protected $primaryKey = 'NIS'; // Gunakan kunci utama 'nis'

    /**
     * Menentukan apakah primary key bertipe integer.
     *
     * @var bool
     */

    public $incrementing = false;

     /**
     * Tipe data primary key.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * Kolom yang dapat diisi (mass assignable).
     *
     * @var array
    */

    protected $fillable = [
                            'NIS',
                            'Password',
                            'Nama',
                            'Jenis_Kelamin', 
                            'Program_Keahlian', 
                            'Kelas'
                        ];
    
    /**
    * Menonaktifkan kolom timestamps.
    *
    * @var bool
    */
    public $timestamps = false;
    
    /**
     * Hidden fields (untuk keamanan).
     *
     * @var array
     */
    protected $hidden = [
        'Password',
    ];

    /**
     * Override fungsi untuk autentikasi password.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->Password;
    }
}
