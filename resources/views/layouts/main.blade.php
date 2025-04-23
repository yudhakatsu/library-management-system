<!-- resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan SMK Baitussalam Pekalongan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script> 
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js'></script>
    <style>
        /* Tambahkan styling umum di sini */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #333;
        }
        body::-webkit-scrollbar {
            display: none;  /* Menyembunyikan scrollbar */
        }
        .logo {
            padding: 20px;
            display: flex;
            align-items: center;
            flex-direction: row;
            gap: 5px;
            text-shadow: 5px 4px 4px #00000040;
        }
        .logo p{
            font-size: 24px;
            font-weight: bold;
            color: #000;
        }
        .logo-perpustakaan{
            width: 83px;
            height: 91px;
            padding-bottom: 5px;
        }
        header {
            margin: 0 20px;
            background-color: #4a3f7e;
            padding:20px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 20px;
            gap: 20px
        }
        header img {
            height: 50px;
            margin-right: 10px;
        }
        nav a {
            color: white;
            margin: 0 20px;
            text-decoration: none;
            font-size: 22px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: none;
        }
        .input-container {
            position: relative; /* Untuk positioning ikon */
            width: 25%;
        }
        .input-container input{
            width: 100%;
            height: 40px;
            padding: 0 20px;
            padding-left: 50px;
            border: 1px solid #fff;
            border-radius: 80px;
            font-size: 18px;
            color: #fff;
            outline: none; /* Menghilangkan garis outline saat input aktif */
            background: transparent; /* Menghilangkan background */
        }
        input::placeholder{
            color: #fff;
        }
        .input-container .icon {
            width: 25px;
            height: 20px;
            position: absolute;
            top: 50%;
            left: 10px; /* Jarak dari sisi kiri */
            transform: translateY(-50%); /* Agar ikon sejajar secara vertikal */
            font-size: 16px; /* Ukuran ikon */
            color: #000;
            padding-left: 10px;
        }
        .container {
            padding: 20px;
        }
        .footer {
            background-color: #4a3f7e;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .profile-menu {
            position: relative;
            display: inline-block;
            padding-right: 10px;
        }

        .profile-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }

        .profile-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            width: 200px;
            text-align: left;
        }

        .dropdown-menu a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
            border-bottom: 1px solid #eee;
        }

        .dropdown-menu a:hover {
            background-color: #f7f7f7;
        }

        .profile-menu:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu::before {
            content: "";
            position: absolute;
            top: -10px;
            right: 20px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid white;
        }
    </style>
</head>
<body>


<div class="logo">
    <img class="logo-sekolah" src="/images/logo-sekolah.png" alt="Logo Sekolah">
    <img class="logo-perpustakaan" src="/images/logo-perpustakaan.png" alt="Logo Perpustakaan">
    <p>Perpustakaan <br>SMK Baitussalam Pekalongan</p>
</div>
<header>
    <nav>
        <a href="{{ route('homepage') }}">Dasboard</a>
        <a href="{{ route('homepage') }}#carouselExampleControlsNoTouching">Tentang</a>
        <a href="{{ route('homepage') }}#layanan">Layanan</a>
        <a href="{{ route('homepage') }}#struktur">Organisasi</a>
        <a href="#kontak">Kontak</a>
        <!-- <a href="{{ route('sirkulasi') }}">Katalog</a> -->
    </nav>
    <div class="input-container">
        <img class="icon" src="{{ asset('images/search-nav.png') }}" alt=""><!-- Ikon bisa diganti dengan gambar atau font-icon -->
        <input type="text" placeholder="Cari...">
    </div>
    <div class="profile-menu">
        <div class="profile-icon">
            <img class="icon" src="{{ asset('images/login-profil.png') }}" alt="">
        </div>
        <div class="dropdown-menu">
            @if(session('user'))
                <!-- Jika user sudah login -->
                <a href="{{ route('profil') }}">Akun Saya</a>
                <a href="{{ route('riwayat-peminjaman') }}">Riwayat Peminjaman</a>
                <a href="{{ route('logout') }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <!-- Jika user belum login -->
                <a href="{{ route('login') }}">Login</a>
            @endif
        </div>
    </div>
</header>

<div class="container-fuild">
    @yield('content')
</div>

@extends('layouts.footer')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const profileMenu = document.querySelector('.profile-menu');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        profileMenu.addEventListener('click', function (e) {
            e.stopPropagation(); // Mencegah klik ke elemen lain
            dropdownMenu.classList.toggle('active');
        });

        document.addEventListener('click', function () {
            dropdownMenu.classList.remove('active');
        });
    });
</script>

<style>
    .dropdown-menu {
        display: none;
    }

    .dropdown-menu.active {
        display: block;
    }
</style>

</body>
</html>
