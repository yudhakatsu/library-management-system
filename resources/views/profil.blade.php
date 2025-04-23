@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mx-auto" style="width: 70%; padding: 20px; border: 2px solid #ccc; margin-top:50px; padding-top:10px; margin-bottom:50px;box-shadow: 5px 4px 4px 0px #2E2751;">
        <div class="text-center">
            <img src="{{asset('images/icon-profil.png')}}" class="rounded-circle" alt="User Avatar" style="width: 300px;">
            <h5 class="mt-3">Ahmad Fahriza</h5>
        </div>
        <form method="POST" action="#" class="mt-4" style="padding: 0 20px;">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
            </div>
            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin">
            </div>
            <div class="mb-3">
                <label for="program_keahlian" class="form-label">Program Keahlian</label>
                <input type="text" class="form-control" id="program_keahlian" name="program_keahlian" placeholder="Masukkan Program Keahlian">
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas">
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn me-2" style= "background-color:#D2C8C8">Batal</button>
                <button type="submit" class="btn"style= "background-color:#2E2751; color:white;" >Simpan</button>
            </div>
        </form>
    </div>
</div>

<style>
    .icon{
        margin-top: 4px;
    }
    /* Tambahkan styling umum di sini */
    .logo-container {
        background-color: #f9f9f9; /* Warna latar belakang untuk logo */
        display: flex;
        align-items: center;
        padding: 15px 15px;
        gap: 10px;
    }
    .logo-container img {
        height: 60px; /* Ukuran logo */
    }
    .logo-title h3 {
        margin: 0; /* Menghilangkan margin default */
        line-height: 1.2; /* Membuat teks lebih rapat */
        text-align: left; /* Tetap sejajar secara kiri */
        font-size: 15px;
    }
    
</style>
@endsection