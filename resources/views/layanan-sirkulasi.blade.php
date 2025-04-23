@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="content">
    <!-- Judul Halaman -->
    <div class="section-title">
        <h4>LAYANAN SIRKULASI</h4>
    </div>
    
    <!-- Alur Peminjaman Buku Section -->
    <section class="peminjaman">
        <h3>Alur Peminjaman Buku</h3>
        <ol>
            <li>Siswa membuka website perpustakaan SMK Baitussalam Pekalongan.</li>
            <li>Pilih layanan sirkulasi dan pinjam sekarang.</li>
            <li>Memilih kategori buku yang ingin dipinjam.</li>
            <li>Klik “pinjam” dan isi form peminjaman buku dengan data sebagai berikut:</li>
            <ul>
                <li>Nama pengguna</li>
                <li>Judul Buku</li>
                <li>Jumlah Buku</li>
                <li>Tanggal pinjam</li>
                <li>Kelas</li>
                <li>No. HP</li>
            </ul>
            <li>Jika yakin klik pinjam, jika ingin membatalkan peminjaman klik batal.</li>
            <li>Jika peminjaman berhasil, segera konfirmasi kepada admin perpustakaan dan ambil buku.</li>
        </ol>
    </section>

    <!-- Alur Perpanjangan Buku Section -->
    <section class="perpanjangan">
        <h3>Alur Perpanjangan Buku</h3>
        <ol>
            <li>Perpanjangan dapat dilakukan 2x.</li>
            <li>Konfirmasi kepada admin dengan menghubungi nomor WhatsApp yang tersedia dengan format:</li>
            <ul>
                <li>Nama lengkap</li>
                <li>Judul Buku</li>
                <li>NIS</li>
            </ul>
        </ol>
    </section>

    <!-- Alur Pengembalian Buku Section -->
    <section class="pengembalian">
        <h3>Alur Pengembalian Buku</h3>
        <ol>
            <li>Lakukan pengembalian buku langsung kepada admin di perpustakaan sesuai batas waktu peminjaman.</li>
        </ol>
    </section>
    
    <div class="button">
        <!-- WhatsApp Button -->
        <a href="https://wa.me/6285842577753" class="btn-whatsapp" style="padding-right: 5px;"><img src="{{asset('images/icon-wa.png')}}" alt=""></a>
        <a href="{{ route('peminjaman-buku') }}" class="btn-whatsapp" style="font-size: 20px; font-weight: 700; padding-top: 15px">Pinjam Sekarang</a>
    </div>
   
</div>

<style>
    /* Title and Sections */
    .content {
        padding: 2rem;
        border-radius: 8px;
        margin-bottom: 1rem;
    }
    .section-title {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px 0;
        padding-bottom: 50px;
        h4{
            background-color: #EFD4A0;
            color: #333;
            padding: 5px 80px;
            border-radius: 20px;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            box-shadow: 5px 7px 4px 0px #00000040;
        }
    }

    section{
        background-color: #F8F1F1;
        border-radius: 10px;
        padding: 10px 30px;
        margin-bottom: 30px;
        line-height: 28px;
    }

    h3{
        font-size: 22px;
        font-weight: 700;
    }

    .content p, .content ul {
        margin-bottom: 1rem;
    }
    ul li {
        margin-bottom: 0.5rem;
        list-style-type: disc;
    }

    /* Button */
    .button{
        margin-top: 50px;
        display: flex;
        justify-content: end;
        gap: 15px;
    }
    .btn-whatsapp {
        color: #fff;
        background-color: #2E2751;
        border-radius: 10px;
        box-shadow: 5px 4px 4px 0px #00000040;
        text-decoration: none;
        padding:5px 15px;
        padding-top: 10px;
    }
</style>
@endsection