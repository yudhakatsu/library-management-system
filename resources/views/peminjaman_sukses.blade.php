@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{ asset('images/check-icon.png') }}" alt="Success">
    <h2>Peminjaman berhasil.</h2>
    <p>Harap melakukan konfirmasi kepada pihak perpustakaan, dan ambil buku yang telah di pinjam</p>
    <a href="{{ route('layanan.riwayat_peminjaman') }}" class="btn">Lihat Riwayat Peminjaman</a>
</div>

<style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 2rem auto;
        padding: 2rem;
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 5px 4px 4px 0px #2E2751;
        max-width: 1100px;
    }
    .container img {
        width: 80px;
        height: 80px;
    }
    .container h2 {
        color: #28a745;
        font-weight: bold;
    }
    .container p {
        text-align: center;
        margin-bottom: 30px;
    }
    .btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        background-color: #F4CE86;
        color: black;
        text-decoration: none;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }
    .btn:hover {
        background-color: #d9b36d;
    }
</style>
@endsection