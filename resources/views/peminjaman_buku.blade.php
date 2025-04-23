@extends('layouts.main')

@section('content')
<!-- Konten Utama -->
<div class="container">
    <!-- Judul Halaman -->
    <div class="section-title">
        <!-- Form untuk memilih kategori -->
        <form method="GET" action="{{ route('peminjaman-buku') }}">
            <select name="kategori" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
                <option value="Semua" {{ $kategori == 'Semua' ? 'selected' : '' }}>Semua</option>
                <option value="Agama" {{ $kategori == 'Agama' ? 'selected' : '' }}>Agama</option>
                <option value="Ilmu Terapan" {{ $kategori == 'Ilmu Terapan' ? 'selected' : '' }}>Ilmu Terapan</option>
                <option value="Ilmu Murni" {{ $kategori == 'Ilmu Murni' ? 'selected' : '' }}>Ilmu Murni</option>
                <option value="Filsafat" {{ $kategori == 'Filsafat' ? 'selected' : '' }}>Filsafat</option>
                <option value="Karya Umum" {{ $kategori == 'Karya Umum' ? 'selected' : '' }}>Karya Umum</option>
                <option value="Ilmu Sosial" {{ $kategori == 'Ilmu Sosial' ? 'selected' : '' }}>Ilmu Sosial</option>
                <option value="Bahasa" {{ $kategori == 'Bahasa' ? 'selected' : '' }}>Bahasa</option>
                <option value="Kesusasteraan" {{ $kategori == 'Kesusasteraan' ? 'selected' : '' }}>Kesusasteraan</option>
                <option value="Sejarah & Geografis" {{ $kategori == 'Sejarah & Geografis' ? 'selected' : '' }}>Sejarah & Geografis</option>
                <option value="Seni dan Olahraga" {{ $kategori == 'Seni dan Olahraga' ? 'selected' : '' }}>Seni & Olahraga</option>
            </select>
        </form>
    </div>
    
    <!-- Daftar Buku -->
    @foreach ($bukus as $buku)
    <div class="book-list">
        <div class="book-item">
            <img src="{{ $buku->gambar_sampul ? Storage::url($buku->gambar_sampul) : asset('images/No_Cover.jpg') }}" alt="Cover Buku" class="img-buku">
            <div class="book-info">
                <h4>{{ $buku->judul }}</h4>
                <p>{{ $buku->penulis }}</p>
                <a href="{{ route('detail-buku', $buku->id) }}" class="pinjam-btn">Lihat Detail</a>
            </div>
            <div class="book-availability">
                <p class="availability-badge">Ketersediaan <br><span>{{ $buku->jumlah_stok }}</span></p>
                <a href="{{ route('form-peminjaman', ['id' => $buku->id]) }}">Pinjam Sekarang</a>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Pagination -->
    <div class="pagination">
        <a href="#">Hal awal</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">Berikutnya</a>
        <a href="#">Hal akhir</a>
    </div>
</div>


<style>
    .section-title {
        display: flex;
        align-items: center;
        justify-content: start;
        .form-select {
            background-color: #EFD4A0;
            color: #333;
            border-radius: 10px;
            font-size: 1.2rem;
            font-weight: bold;
            margin: 10px 0;
            box-shadow: 5px 7px 4px 0px #00000040;
        }
        option{
            background-color: #fff;
        }
    }
    .container{
        margin-top: 10px;
        margin-bottom: 50px;
    }
    .book-list {
        margin-top: 20px;
    }
    .book-item {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .book-item img {
        width: 100px;
        height: 150px;
        object-fit: cover;
        margin-right: 15px;
    }
    .book-info {
        flex-grow: 1;
    }
    .book-info p{
        border: 1px solid #000;
        width: 25%;
        padding-left: 10px;
        border-radius: 10px;
    }
    .book-availability {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-right: 10px;
    }
    .availability-badge {
        color: #000;
        border: 1px solid #000;
        border-radius: 8px;
        padding: 10px;
        font-size: 14px;

        span{
            font-weight: bold;
            font-size: 24px;
        }
    }
    .pinjam-btn {
        padding: 5px;
        border-radius: 8px;
        background-color: #A3816A;
        color: white;
        text-decoration: none;
        font-size: 14px;
        width: 80px;
    }
    .pinjam {
        padding: 5px;
        border-radius: 8px;
        background-color: #2E2751;
        color: white;
        text-decoration: none;
        font-size: 14px;
        width: 80px;
    }
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .pagination a {
        padding: 5px 12px;
        margin: 0 5px;
        text-decoration: none;
        color: #000;
        background-color: #D2C8C8;
        border-radius: 20px;
    }
    .pagination a:hover{
        background-color: #343a40;
        color: white;
    }
    .pagination .active {
        background-color: #343a40;
        color: white;
    }
    
</style>
@endsection