<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kunjungan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .title {
            text-align: center;
        }

        .sub-title {
            padding-top: 3px;
            text-align: center;
        }

        .sejajar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .content {
            display: flex;
            justify-content: center;
            padding-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }

        td.nama-column {
            text-align: left; /* Khusus kolom 'Nama' */
            padding-left: 10px;
        }

    </style>
</head>
<body>

    <h3 class="title" style="text-align: center;">LAPORAN TAHUNAN PERPUSTAKAAN</h3>
    <h4 class="sub-title" style="text-align: center;">SMK Baitussalam Pekalongan</h4>
    <h4 class="sub-title" style="text-align: center;">Tahun Ajaran 2024/2025</h4>

    <br>
    <p>A. Rekap reservasi kunjungan : </p>
    <div class="content">
        <table>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas/Jurusan</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
            </tr>
            @foreach ($data1 as $index1)
            <tr>
                <td>{{ $index1['NIS'] ?? '-' }}</td>
                <td class="nama-column">{{ $index1['Nama'] }}</td>
                <td>{{ $index1['Kelas_Jurusan'] ?? '-' }}</td>
                <td>{{ $index1['Tanggal'] }}</td>
                <td>{{ $index1['Ket'] }}</td>
            </tr>
            @endforeach
            <tr style="border-top: 3px solid black;">
                <td colspan="4" style="font-weight: bold; text-align: right;">Total Kunjungan Siswa {{ date('Y') }}:</td>
                <td colspan="1">{{ $data1->filter(function ($item) {
                    return \Carbon\Carbon::parse($item['Tanggal'])->year == date('Y');
                })->count() }}</td>
            </tr>
        </table>
    </div>

    <p>B. Rekap reservasi kunjungan : </p>
    <div class="content">
        <table>
            <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
            </tr>
            @foreach ($data1_1 as $index1_1)
            <tr>
                <td class="nama-column">{{ $index1_1['Nama'] }}</td>
                <td>{{ $index1_1['Tanggal'] }}</td>
                <td>{{ $index1_1['Ket'] }}</td>
            </tr>
            @endforeach
            <tr style="border-top: 3px solid black;">
                <td colspan="2" style="font-weight: bold; text-align: right;">Total Kunjungan Tamu {{ date('Y') }}:</td>
                <td colspan="1">{{ $data1_1->filter(function ($item) {
                    return \Carbon\Carbon::parse($item['Tanggal'])->year == date('Y');
                })->count() }}</td>
            </tr>
        </table>
    </div>

    <p>C. Rekap Inventaris Buku : </p>
    <div class="content">
        <table>
            <tr>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Sumber</th>
                <th>Penerbit/Tempat Terbit</th>
                <th>Tahun Terbit</th>
                <th>Tanggal Masuk</th>
                <th>Jumlah</th>
                <th>Penerima</th>
            </tr>
            @foreach ($data2 as $index2)
            <tr>
                <td>{{ $index2['Judul_Buku'] }}</td>
                <td class="nama-column">{{ $index2['Pengarang'] }}</td>
                <td>{{ $index2['Sumber'] }}</td>
                <td>{{ $index2['Penerbit'] }}/{{ $index2['Tempat_Terbit'] }}</td>
                <td>{{ $index2['Tahun_Terbit'] }}</td>
                <td>{{ $index2['Tanggal_Masuk'] }}</td>
                <td>{{ $index2['Jumlah'] }}</td>
                <td>{{ $index2['Penerima'] }}</td>
            </tr>
            @endforeach
            <tr style="border-top: 3px solid black;">
                <td colspan="7" style="font-weight: bold; text-align: right;">Total Buku Masuk Tahun {{ date('Y') }}:</td>
                <td colspan="1">{{ $data2->filter(function ($item) {
                    return \Carbon\Carbon::parse($item['Tanggal_Masuk'])->year == date('Y');
                })->count() }}</td>
            </tr>
        </table>
    </div>

    <p>D. Rekap Riwayat Peminjaman : </p>
    <div class="content">
        <table>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
            </tr>
            @foreach ($data3 as $index3)
            <tr>
                <td>{{ $index3['nis'] ?? '-' }}</td>
                <td class="nama-column">{{ $index3['nama'] }}</td>
                <td>{{ $index3['Judul_Buku'] ?? '-' }}</td>
                <td>{{ $index3['Tanggal_Pinjam'] }}</td>
                <td>{{ $index3['Tanggal_Kembali'] }}</td>
            </tr>
            @endforeach
            <tr style="border-top: 3px solid black;">
                <td colspan="4" style="font-weight: bold; text-align: right;">Total Peminjaman Tahun {{ date('Y') }}:</td>
                <td colspan="1">{{ $data3->filter(function ($item) {
                    return \Carbon\Carbon::parse($item['Tanggal_Pinjam'])->year == date('Y');
                })->count() }}</td>
            </tr>
        </table>
    </div>

    <p>Demikian kami sampaikan laporan rekap reservasi kunjungan SMK Baitussalam Pekalongan.</p>
    <div class="ttd" style="display: flex; flex-direction: column; align-items: flex-end; margin-top: 20px; margin-right: 50px;">
        <p>Pekalongan, ... Desember 2024</p>
        <p>Kepala Sekolah</p>
        <p class="kolom-ttd" style="padding-top: 10px;">...................</p>
    </div>
    
</body>
</html>
