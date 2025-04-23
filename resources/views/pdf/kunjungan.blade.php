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
    <p>Kop Sekolah</p>

    <h3 class="title" style="text-align: center;">    LAPORAN BULANAN</h3>
    <h4 class="sub-title" style="text-align: center;">Reservasi Kunjungan SMK Baitussalam Pekalongan</h4>

    <p class="sejajar">1. Nama Sekolah : ....................</p>
    <p class="sejajar">2. NPSN         : ....................</p>
    <p class="sejajar">3. Alamat       : ....................</p>
    <br>

    <p>4. Rekap reservasi kunjungan Siswa : </p>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas/Jurusan</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswa as $item)
                    <tr>
                        <td>{{ $item->NIS }}</td>
                        <td>{{ $item->Nama }}</td>
                        <td>{{ $item->Kelas_Jurusan }}</td>
                        <td>{{ $item->Tanggal }}</td>
                        <td>{{ $item->Ket }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada data siswa untuk bulan ini</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr style="border-top: 3px solid black;">
                    <td colspan="4" style="font-weight: bold; text-align: right;">Total Kunjungan Siswa: </td>
                    <td style="font-weight: bold;">{{ $siswa->count() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <p>5. Rekap reservasi kunjungan Tamu : </p>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tamu as $item)
                    <tr>
                        <td class="nama-column">{{ $item->Nama }}</td>
                        <td>{{ $item->Tanggal }}</td>
                        <td>{{ $item->Ket }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Tidak ada data tamu untuk bulan ini</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr style="border-top: 3px solid black;">
                    <td colspan="2" style="font-weight: bold; text-align: right;">Total Kunjungan Tamu: </td>
                    <td style="font-weight: bold;">{{ $tamu->count() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <p>Demikian kami sampaikan laporan rekap reservasi kunjungan SMK Baitussalam Pekalongan.</p>
    <div class="ttd" style="display: flex; flex-direction: column; align-items: end; margin-top: 20px; margin-right: 50px;">
        <p>Pekalongan, ... Desember 2024</p>
        <p>Kepala Sekolah</p>
        <p class="kolom-ttd" style="padding-top: 80px;">...................</p>
    </div>
    
</body>
</html>
