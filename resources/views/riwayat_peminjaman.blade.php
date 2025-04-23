@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Judul Halaman -->
    <div class="section-title">
        <h4>RIWAYAT PEMINJAMAN BUKU</h4>
    </div>

    <table>
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($riwayatPeminjaman as $item)
            <tr>
                <td>{{ $item['Judul_Buku'] }}</td>
                <td>{{ $item['Tanggal_Pinjam'] }}</td>
                <td>{{ $item['Tanggal_Kembali'] }}</td>
                <td>
                    <span class="badge 
                        @if($item['Status'] == 'Diajukan') bg-warning 
                        @elseif($item['Status'] == 'ACC') bg-success 
                        @elseif($item['Status'] == 'Dikembalikan') bg-danger 
                        @endif">
                        {{ $item['Status'] }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
    /* CSS untuk Konten */
    .section-title {
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 30px;
        padding-bottom: 50px;
        h4{
            background-color: #EFD4A0;
            color: #333;
            padding: 5px 40px;
            border-radius: 5px;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
        }
    }
    .container {
        max-width: 1200px;
        padding: 20px;
        background-color: white;
    }
    .header {
        text-align: center;
        font-size: 18px;
        background-color: #f5c37f;
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: bold;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }
    table th {
        background-color: #D2C8C8;
        font-weight: bold;
    }
    tbody tr:nth-child(odd) td {
        background-color: #fff; /* Warna latar belakang untuk baris ganjil */
    }

    tbody tr:nth-child(even) td {
        background-color: #A5A5A540; /* Warna latar belakang untuk baris genap */
    }
    .status {
        font-weight: bold;
        border-radius: 4px;
        padding: 5px 10px;
        display: inline-block;
        color: white;
    }
    .status.selesai {
        background-color: #63c76a;
    }
    .status.terlambat {
        background-color: #ff6b6b;
    }
    .status.sedang-dipinjam {
        background-color: #f8d84e;
        color: black;
    }
</style>
@endsection