@extends('layouts.main')

@section('content')
<!-- Header dengan Background Warna -->
<div class="dhasboard" id="dhasboard" style="color: white; padding: 50px 20px;">
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <!-- Teks Selamat Datang -->
        <div style="flex: 1; padding-left: 30px;  text-shadow: 5px 4px 4px 0px #00000040;">
            <h1 style="color: #000; font-size: 48px; font-style: italic; font-weight: bold; line-height: 65px;text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);">Selamat Datang di <br> Perpustakaan SMK Baitussalam <br> Pekalongan</h1>
        </div>

        <!-- Ilustrasi Gambar -->
        <div style="flex: 0.7; text-align: center; padding-left: 50px;">
            <img src="{{ asset('images/illustration-library.png') }}" alt="Ilustrasi Perpustakaan" style="max-width: 80%; height: auto;">
        </div>
    </div>
</div>

<div id="carouselExampleControlsNoTouching" class="carousel carousel-dark slide" data-bs-touch="false">
  <div class="carousel-inner" style=" padding: 20px;">
    <div class="carousel-item active" style="box-shadow: 5px 7px 4px 0px #00000040;border-radius: 20px;">
        <div class="slide1" style="display: flex; flex-direction: row; gap: 50px; padding: 40px 60px; background-color: #EFD4A0; box-shadow: 5px 7px 4px 0px #00000040; height: 450px; border-radius: 20px;">
            <div class="slide1-content" style="font-size: 24px; color: #000; width: 60%; display: flex; flex-direction: column; justify-content: center;">
                <!-- Deskripsi Perpustakaan -->
                 <h5 style="font-weight: bold; font-size: 24px; padding-bottom: 20px;">Perpustakaan <br> SMK Baitussalam Pekalongan</h5>
                <p>Perpustakaan ini beralamat di Jl. Darma Bakti No.3, Medono, Kec. Pekalongan Barat, Kota Pekalongan, Jawa Tengah 51111, tepatnya di lantai 2 SMK Baitussalam Pekalongan sebelah laboratorium komputer. Terdapat beberapa fasilitas yang disediakan yaitu mading dan pojok baca. Perpustakaan SMK Baitussalam Pekalongan sering dijadikan sebagai tempat belajar oleh guru dan siswa, terutama mata pelajaran Bahasa Indonesia.</p>
            </div>
            <div class="slide1-img" style="padding-left: 60px; display: flex; align-items: center;">
                <img src="{{asset('images/library-background.png')}}" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <div class="carousel-item" style="box-shadow: 5px 7px 4px 0px #00000040;border-radius: 20px;">
      <div class="slide2" style="height: 450px; background-color: #EFD4A0; display: flex; justify-content: center; align-items: center; box-shadow: 5px 7px 4px 0px #00000040; height: 450px; border-radius: 20px; position: relative; overflow: hidden;">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url('{{ asset('images/slide1.jpg') }}'); background-size: cover; background-position: center; filter: brightness(35%);"></div>
        <h1 style="position: relative; color: white; font-weight: bold; bold; z-index: 1;">Selamat Datang di Perpustakaan</h1>
      </div>
    </div>
    <div class="carousel-item">
        <div class="slide2" style="height: 450px; background-color: #EFD4A0; display: flex; justify-content: center; align-items: center; box-shadow: 5px 7px 4px 0px #00000040; height: 450px; border-radius: 20px; position: relative; overflow: hidden;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url('{{ asset('images/Slide2.jpg') }}'); background-size: cover; background-position: center; filter: brightness(35%);"></div>
            <h1 style="position: relative; color: white; font-weight: bold; bold; z-index: 1;">HEHEHEHEHHE...</h1>
        </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev" style="width: 8%;">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next" style="width: 8%;">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Statistik Perpustakaan -->
<div class="statistik" id="statistik" style="display: flex; justify-content: space-around; margin-top: 50px; padding: 20px;">
    <div style="text-align: center; width: 310px; border-radius: 20px; box-shadow: 5px 4px 4px 0px #2E2751; display: flex; flex-direction: row; padding: 20px 30px;">
        <div class="icon-stat" style="background-color: #D2C8C8; width: 80px; height: 80px; border-radius: 50%; margin-right: 20px; display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('images/icon-koleksi.png')}}" alt="" style="width: 45px;">
        </div>
        <div class="content-stat" style="line-height: 14.2px; margin-top: 7px;">
            <p style="font-size: 20px; font-weight: bold;">Total Koleksi</p>
            <h3 style="font-size: 32px; font-weight: bold;">{{ $totalkoleksi }}</h3>
        </div>
    </div>
    <div style="text-align: center; width: 310px; border-radius: 20px; box-shadow: 5px 4px 4px 0px #2E2751; display: flex; flex-direction: row; padding: 20px 30px;">
        <div class="icon-stat" style="background-color: #D2C8C8; width: 80px; height: 80px; border-radius: 50%; margin-right: 10px; display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('images/icon-eksemplar.png')}}" alt="" style="width: 45px;">
        </div>
        <div class="content-stat" style="line-height: 14.2px; margin-top: 7px;">
            <p style="font-size: 20px; font-weight: bold;">Total Eksemplar</p>
            <h3 style="font-size: 32px; font-weight: bold;">{{ $totaleksemplar }}</h3>
        </div>
    </div>
    <div style="text-align: center; width: 310px; border-radius: 20px; box-shadow: 5px 4px 4px 0px #2E2751; display: flex; flex-direction: row; padding: 20px 30px;">
        <div class="icon-stat" style="background-color: #D2C8C8; width: 80px; height: 80px; border-radius: 50%; margin-right: 10px; display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('images/icon-anggota.png')}}" alt="" style="width: 65px;">
        </div>
        <div class="content-stat" style="line-height: 14.2px; margin-top: 7px;">
            <p style="font-size: 20px; font-weight: bold;">Jumlah Anggota</p>
            <h3 style="font-size: 32px; font-weight: bold;">{{ $anggota }}</h3>
        </div>
    </div>
    <div style="text-align: center; width: 310px; border-radius: 20px; box-shadow: 5px 4px 4px 0px #2E2751; display: flex; flex-direction: row; padding: 20px 30px;">
        <div class="icon-stat" style="background-color: #D2C8C8; width: 80px; height: 80px; border-radius: 50%; margin-right: 40px; display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('images/icon-petugas.png')}}" alt="" style="width: 65px;">
        </div>
        <div class="content-stat" style="line-height: 14.2px; margin-top: 7px;">
            <p style="font-size: 20px; font-weight: bold;">Petugas</p>
            <h3 style="font-size: 32px; font-weight: bold;">3</h3>
        </div>
    </div>
</div>

<!-- Layanan Perpustakaan -->
<div class="layanan" id="layanan" style="margin-top: 100px; text-align: center;">
    <h2 style="font-size: 32px; font-weight: bold;">Layanan Perpustakaan</h2>
    <div style="display: flex; justify-content: space-around; margin-top: 20px; padding: 20px;">
        <div style="position: relative; padding: 30px; border: 1px solid #000000; border-radius: 10px; width: 368px; height: 385px; background-color: #fff; box-shadow: 5px 5px 4px 0px #2E2751;">
            <!-- Pseudo-element for double shadow -->
            <div style="position: absolute; top: 10px; left: 10px; width: 368px; height: 385px; background-color: #fff; border-radius: 10px; box-shadow: 5px 5px 4px 0px #2E2751; z-index: -1;"></div>
            <img src="{{ asset('images/icon-layanan.png')}}" alt="" style="margin-top: 20px;">
            <h3 style="font-size:24px; font-weight: bold; margin-top: 10px;">REFERENSI</h3>
            <p style="margin-top: 20px; margin-bottom: 90px; font-size: 20px; font-weight: 400; line-height: 19px;">Layanan koleksi <br> buku perpustakaan <br> (Baca di tempat)</p>
            <a href="{{ route('sirkulasi') }}" style="color: #0000008F; text-decoration: none;">Lihat selengkapnya...</a>
        </div>
        <div style="position: relative; padding: 30px; border: 1px solid #000000; border-radius: 10px; width: 368px; height: 385px; background-color: #fff; box-shadow: 5px 5px 4px 0px #2E2751;">
            <!-- Pseudo-element for double shadow -->
            <div style="position: absolute; top: 10px; left: 10px; width: 368px; height: 385px; background-color: #fff; border-radius: 10px; box-shadow: 5px 5px 4px 0px #2E2751; z-index: -1;"></div>
            <img src="{{ asset('images/icon-layanan.png')}}" alt="" style="margin-top: 20px;">
            <h3 style="font-size:24px; font-weight: bold; margin-top: 10px;">SIRKULASI</h3>
            <p style="margin-top: 20px; margin-bottom: 50px; font-size: 20px; font-weight: 400; line-height: 19px;">Layanan <br> peminjaman online, <br> perpanjangan dan <br> pengembalian <br> koleksi buku</p>
            <a href="{{ route('layanan-sirkulasi') }}" style="color: #0000008F; text-decoration: none;">Lihat selengkapnya...</a>
        </div>
        <div style="position: relative; padding: 30px; border: 1px solid #000000; border-radius: 10px; width: 368px; height: 385px; background-color: #fff; box-shadow: 5px 5px 4px 0px #2E2751;">
            <!-- Pseudo-element for double shadow -->
            <div style="position: absolute; top: 10px; left: 10px; width: 368px; height: 385px; background-color: #fff; border-radius: 10px; box-shadow: 5px 5px 4px 0px #2E2751; z-index: -1;"></div>
            <img src="{{ asset('images/icon-layanan.png')}}" alt="" style="margin-top: 20px;">
            <h3 style="font-size:24px; font-weight: bold; margin-top: 10px;">RESERVASI</h3>
            <p style="margin-top: 20px; margin-bottom: 90px; font-size: 20px; font-weight: 400; line-height: 19px;">Layanan reservasi <br> kunjungan <br> perpustakaan</p>
            <a href="{{ route('layanan-reservasi') }}" style="color: #0000008F; text-decoration: none;">Lihat selengkapnya...</a>
        </div>
    </div>
</div>

<!-- Struktur Organisasi -->
<div class="struktur" id="struktur" style="margin-top: 50px; text-align: center; margin-bottom: 80px;">
    <h2 style="font-size: 32px; font-weight: bold;">Struktur Organisasi SMK Baitussalam Pekalongan</h2>
    <img src="{{ asset('images/struktur-organisasi.png') }}" alt="Struktur Organisasi" style="max-width: 80%; margin-top: 20px; border-radius: 10px;">
</div>

@endsection
