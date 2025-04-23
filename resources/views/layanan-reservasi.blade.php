@extends('layouts.main')

@section('content')
<!-- Konten -->
<div class="container">
    <!-- Judul Halaman -->
    <div class="section-title">
        <h4>LAYANAN RESERVASI</h4>
    </div>
    
    <!-- Deskripsi Layanan -->
    <div class="description">
        <p>
            Layanan reservasi kunjungan perpustakaan SMK Baitussalam Pekalongan 
            adalah sistem yang memudahkan siswa dalam mengatur jadwal kunjungan ke perpustakaan. 
            Layanan ini dioperasikan oleh admin perpustakaan (pustakawan). Siswa hanya perlu memberikan 
            Nomor Induk Siswa (NIS)saat mengajukan reservasi. Admin kemudian akan memproses dan menginput 
            data reservasi ke dalam sistem melalui halaman reservasi khusus admin. 
            Jika pengunjung bukan merupakan siswa atau  anggota perpustakaan maka wajib menyebutkan 
            status dari pengunjung tersebut kepada admin.
        </p>
    </div>

    <!-- Aturan Layanan Reservasi -->
    <div class="rules">
        <h3>ATURAN LAYANAN RESERVASI</h3>
        <ul>
            <li style="list-style-type: none;"><strong>1. Pengajuan Reservasi</strong>
                <ul>
                    <li>Pengajuan reservasi hanya bisa dilakukan melalui admin perpustakaan. Siswa cukup menyebutkan NIS mereka saat ingin melakukan kunjungan.</li>
                    <li>Admin bertanggung jawab memasukkan NIS siswa /status pengunjung ke sistem reservasi.</li>
                </ul>
            </li>
            <li style="list-style-type: none;"><strong>2. Pengajuan Reservasi</strong>
                <ul>
                    <li>Siswa harus mengajukan reservasi setidaknya paling cepat 1 hari sebelum kunjungan.</li>
                    <li>Setiap hari, hanya tersedia slot kunjungan terbatas untuk menjaga kapasitas perpustakaan.</li>
                </ul>
            </li>
            <li style="list-style-type: none;"><strong>3. Waktu operasional kunjungan</strong>
                <ul>
                    <li>Kunjungan perpustakaan diatur dalam jam operasional sekolah: Senin – Jumat: 07:00 – 14:00</li>
                    <li>Reservasi di luar jam operasional akan ditolak.</li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<style>
    /* CSS untuk Konten */
    .section-title {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px 0;
        padding-bottom: 50px;
        h4{
            background-color: #EFD4A0;
            color: #333;
            padding: 5px 40px;
            border-radius: 20px;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            box-shadow: 5px 7px 4px 0px #00000040;
        }
    }
    .description {
        background-color: #f8f1f1;
        padding: 40px 80px;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-size: 18px;
    }
    .rules {
        margin-top: 50px;
        background-color: #f8f1f1;
        padding: 20px 40px;
        border-radius: 8px;
        color: #333;
        margin-bottom: 50px;
    }
    .rules h3 {
        font-size: 1.2rem;
        margin-bottom: 60px;
        color: #4A3F7E;
        text-align: center;
        font-weight: bold;
    }
    .rules ul {
        font-size: 18px;
        list-style-type: disc;
        margin-left: 20px;
        color: #333;
        margin-bottom: 20px;
    }
</style>
@endsection