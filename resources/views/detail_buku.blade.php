@extends('layouts.main')

@section('content')
<div class="container">
    <div class="book-detail-container">
        <!-- Judul Halaman -->
        <div class="section-title">
            <h4>INFORMASI DETAIL</h4>
        </div>
    
        
        <div class="book-detail-content">
            <div class="book-image">
            <img src="{{ $buku['gambar_sampul'] ? Storage::url( $buku['gambar_sampul']) : asset('images/No_Cover.jpg') }}
            " alt="Cover Buku" class="img-buku">
            <a href="{{ route('form-peminjaman', ['id' => $buku->id]) }}">Pinjam Sekarang</a>
            </div>
            
            <div class="book-info">
                <h3>{{ $buku->judul }}</h3>
                <p>— {{ $buku->penulis }} —</p>
                
                <table class="book-info-table">
                    <tr><td>Judul Seri</td><td>: {{ $buku->judul }}</td></tr>
                    <tr><td>Penerbit</td><td>: {{ $buku->penerbit }}</td></tr>
                    <tr><td>Deskripsi Fisik</td><td>: {{ $buku->deskripsi }}</td></tr>
                    <tr><td>Bahasa</td><td>: Indoneisa</td></tr>
                    <tr><td>ISBN/ISSN</td><td>: - </td></tr>
                    <tr><td>Klasifikasi</td><td>: - </td></tr>
                    <tr><td>Tipe Isi</td><td>: {{ $buku->kategori }} </td></tr>
                    <!-- <tr><td>Tipe Media</td><td>: - </td></tr>
                    <tr><td>Tipe Pembawa</td><td>: - </td></tr>
                    <tr><td>Edisi</td><td>: - </td></tr> -->
                    <tr><td>Subyek</td><td>: - </td></tr>
                    <tr><td>Info Detail Spesifik</td><td>: ditulis oleh {{ $buku->penulis }} </td></tr>
                    <tr><td>Pernyataan</td><td>: diterbitkan pada tahun {{ $buku->tahun_terbit }} </td></tr>
                    <tr><td>Tanggung Jawab</td><td>: - </td></tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- CSS langsung di dalam view -->
<style>
    .section-title {
        display: flex;
        align-items: center;
        justify-content: start;
        padding: 20px 0;
        h4{
            background-color: #EFD4A0;
            color: #333;
            padding: 5px 40px;
            border-radius: 5px;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            box-shadow: 5px 7px 4px 0px #00000040;
        }
    }
    .container {
        padding: 20px;
        margin-bottom: 50px;
    }

    .book-detail-container h2 {
        background-color: #FFDD94;
        padding: 10px 20px;
        border-radius: 5px;
        color: #333;
        font-weight: bold;
        text-align: left;
    }

    .book-detail-content {
        display: flex;
        gap: 20px;
        margin-top: 20px;
        border: 1px solid #e0e0e0;
        padding: 20px;
        border-radius: 10px;
        background-color: #fff;
    }

    .book-image{
        display: flex;
        flex-direction: column;
        text-align: center;
        align-items: center;
        gap: 15px;
    }
    .book-image a{
        padding: 10px;
        background-color: #A3816A;
        width: 150px;
        border-radius: 10px;
        color: #fff;
        font-weight: bold;
        text-decoration: none;
    }
    .book-image a:hover{
        background-color: #2E2751;
    }
    .book-image img {
        width: 200px;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .book-info h3 {
        font-size: 1.5em;
        margin-bottom: 5px;
    }

    .book-info p {
        font-style: italic;
        color: #555;
        margin-bottom: 20px;
    }

    .book-info-table {
        width: 100%;
        font-size: 0.95em;
        border-collapse: collapse;
    }

    .book-info-table td {
        padding: 8px 5px;
    }

    .book-info-table td:first-child {
        font-weight: bold;
        width: 150px;
        color: #555;
    }

    .book-info-table td:nth-child(2) {
        color: #333;
    }

    .footer {
        background-color: #2E2751;
        color: #fff;
        padding: 20px 0;
    }

    .footer-container {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding: 0 20px;
    }

    .footer-section h4 {
        margin-bottom: 10px;
        font-weight: bold;
        font-size: 1.1em;
    }

    .footer-section p {
        margin: 5px 0;
    }

    .footer-bottom {
        text-align: center;
        margin-top: 10px;
        font-size: 0.9em;
        color: #ccc;
    }
</style>
@endsection
