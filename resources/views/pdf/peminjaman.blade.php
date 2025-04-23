<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
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

    <h3 class="title" style="text-align: center;">    LAPORAN BULANAN</h3>
    <h4 class="sub-title" style="text-align: center;">Peminjaman Buku SMK Baitussalam Pekalongan</h4>

    <p class="sejajar">1. Nama Sekolah : ....................</p>
    <p class="sejajar">2. NPSN         : ....................</p>
    <p class="sejajar">3. Alamat       : ....................</p>
    <br>

    <p>4. Rekap Peminjaman Buku : </p>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->Judul_Buku }}</td>
                        <td>{{ $item->Tanggal_Pinjam }}</td>
                        <td>{{ $item->Tanggal_Kembali }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada data untuk bulan ini</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr style="border-top: 3px solid black;">
                    <td colspan="4" style="font-weight: bold; text-align: right;">Total Peminjaman: </td>
                    <td style="font-weight: bold;">{{ $data->count() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <p>Demikian kami sampaikan laporan rekap peminjaman buku SMK Baitussalam Pekalongan.</p>
    <div class="ttd" style="display: flex; flex-direction: column; align-items: end; margin-top: 20px; margin-right: 50px;">
        <p>Pekalongan, ... Desember 2024</p>
        <p>Kepala Sekolah</p>
        <p class="kolom-ttd" style="padding-top: 80px;">...................</p>
    </div>
    
</body>
</html>
