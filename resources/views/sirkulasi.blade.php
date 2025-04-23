@extends('layouts.main')

@section('content')
<!-- Konten Utama -->
<div class="container">
    <!-- Judul Halaman -->
    <div class="section-title">
        <h4>LAYANAN REFERENSI</h4>
    </div>
    <p>
        Layanan sirkulasi di perpustakaan SMK Baitussalam Pekalongan meliputi peminjaman, 
        perpanjangan, dan pengembalian buku. Layanan ini dirancang untuk memudahkan siswa dan staf 
        dalam mengakses koleksi buku yang ada di perpustakaan.
    </p>

    <div class="pilih">
        <h5> Pilih subjek yang menarik bagi anda lakukan peminjaman online.</h5>
        <a href="{{ route('peminjaman-buku') }}"><p>Semua kategori...</p></a>
    </div>

    <!-- Kategori Buku -->
    <div class="card-grid">
        <div class="card">
            <a href="{{ route('peminjaman-buku1', ['kategori' => 'Agama']) }}" class="sub-card">
                <div class="icon"><img src="{{ asset('images/icon-agama.png') }}" alt=""></div>
                <p>Agama</p>
            </a>
            <a href="{{ route('peminjaman-buku1', ['kategori' => 'Ilmu Terapan']) }}" class="sub-card">
                <div class="icon"><img src="{{ asset('images/icon-terapan.png') }}" alt="" style="width: 70px; padding-top: 20px; margin-bottom: 10px;"></div>
                <p>Ilmu Terapan</p>
            </a>
            <a href="{{ route('peminjaman-buku1', ['kategori' => 'Ilmu Murni']) }}" class="sub-card">
                <div class="icon"><img src="{{ asset('images/icon-murni.png') }}" alt=""></div>
                <p>Ilmu Murni</p>
            </a>
            <a href="{{ route('peminjaman-buku1', ['kategori' => 'Filsafat']) }}" class="sub-card">
                <div class="icon"><img src="{{ asset('images/icon-filsafat.png') }}" alt="" style="width: 90px;"></div>
                <p>Filsafat</p>
            </a>
        </div>

        <div class="card">
            <a href="{{ route('peminjaman-buku1', ['kategori' => 'Karya Umum']) }}" class="sub-card">
                <div class="icon"><img src="{{ asset('images/icon-karyaumum.png') }}" alt="" style="width: 90px; padding-top: 10px; margin-bottom: 10px;"></div>
                <p>Karya Umum</p>
            </a>
            <a href="{{ route('peminjaman-buku1', ['kategori' => 'Ilmu Sosial']) }}" class="sub-card">
                <div class="icon"><img src="{{ asset('images/icon-sosial.png') }}" alt=""></div>
                <p>Ilmu Sosial</p>
            </a>
            <a href="{{ route('peminjaman-buku1', ['kategori' => 'Bahasa']) }}" class="sub-card">
                <div class="icon"><img src="{{ asset('images/icon-bahasa.png') }}" alt="" style="width: 80px; padding-top: 10px; margin-bottom: 10px;"></div>
                <p>Bahasa</p>
            </a>
            <a href="{{ route('peminjaman-buku1', ['kategori' => 'Kesusasteraan']) }}" class="sub-card">
                <div class="icon"><img src="{{ asset('images/icon-sastra.png') }}" alt=""></div>
                <p>Kesusasteraan</p>
            </a>
        </div>
        
        <div class="card">
            <div class="sub-card">
                <div class="icon"><img src="{{asset('images/icon-sejarah.png')}}" alt="" style="width: 80px; padding-top: 10px; "></div>
                <p>Sejarah & Geografi</p>
            </div>
            <div class="sub-card">
                <div class="icon"><img src="{{asset('images/icon-seni.png')}}" alt="" style="width: 80px; padding-top: 0px;"></div>
                <p>Seni dan Olahraga</p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Tambahkan CSS sesuai kebutuhan */
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
    .container {
        margin: auto;
    }
    .container p{
        padding: 0 50px;
        text-align: center;
        margin-bottom: 100px;
    }
    .pilih{
        display: flex;
        flex-direction: row;
        padding-bottom: 0px;
        height: 50px;
        padding-top: 10px;
    }
    .pilih h5{
        width: 80%;
        font-size: 18px;
        font-weight: bold;
    }
    .pilih a{
        text-decoration: none;
        color: #0000008F;
    }
    .card-grid {
        display: flex;
        flex-direction: column;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        margin-bottom: 50px;
    }
    .card {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        gap: 20px;
        border: none;
    }
    .sub-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .sub-card{
        width: 250px;
        height: 200px;
        background-color: #fff;
        border: 1px solid #000000;
        border-radius: 8px;
        box-shadow: 5px 4px 8px 0px #2E2751;
        padding: 20px;
        text-align: center;
        transition: box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 20px;
        text-decoration: none;
        color: #000;
        p{
            width: 500px;
            font-size: 18px;
        }
    }
    .icon {
        font-size: 40px;
        margin-bottom: 20px;
    }
</style>
@endsection