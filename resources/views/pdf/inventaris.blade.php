<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Inventaris</title>
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
    <p>Kop Sekolah</p>

    <h3 class="title" style="text-align: center;">    LAPORAN BULANAN </h3>
    <h4 class="sub-title" style="text-align: center;">Inventaris Buku SMK Baitussalam Pekalongan</h4>

    <p class="sejajar">1. Nama Sekolah : ....................</p>
    <p class="sejajar">2. NPSN         : ....................</p>
    <p class="sejajar">3. Alamat       : ....................</p>
    <br>

    <p>4. Rekap Inventaris Buku : </p>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit/Tempat Terbit</th>
                    <th>Tahun Terbit</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Tanggal Masuk</th>
                    <th>Penerima</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->Judul_Buku }}</td>
                        <td>{{ $item->Pengarang }}</td>
                        <td>{{ $item->Penerbit }} - {{ $item->Tempat_Terbit }}</td>
                        <td>{{ $item->Tahun_Terbit }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->Jumlah }}</td>
                        <td>{{ $item->Tanggal_Masuk }}</td>
                        <td>{{ $item->Penerima }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada data untuk bulan ini</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr style="border-top: 3px solid black;">
                    <td colspan="7" style="font-weight: bold; text-align: right;">Total Buku Masuk: </td>
                    <td style="font-weight: bold;">{{ $data->count() }}</td>
                </tr>
                <tr>
                    <td colspan="7" style="font-weight: bold; text-align: right;">Jumlah Buku: </td>
                    <td style="font-weight: bold;">{{ $data->sum('Jumlah') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <p>Demikian kami sampaikan laporan rekap inventaris buku SMK Baitussalam Pekalongan.</p>
    <div class="ttd" style="display: flex; flex-direction: column; align-items: end; margin-top: 20px; margin-right: 50px;">
        <p>Pekalongan, ... Desember 2024</p>
        <p>Kepala Sekolah</p>
        <p class="kolom-ttd" style="padding-top: 80px;">...................</p>
    </div>
    
</body>
</html>
