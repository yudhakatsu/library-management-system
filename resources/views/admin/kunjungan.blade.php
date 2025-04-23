<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Kunjungan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-bg {
            background-color: #F2BD29;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 330px;
            z-index: 1;
            opacity: 0.63;
        }

        /* Sidebar */
        .sidebar {
            background-color: #F2BD29;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 300px;
            padding: 20px 15px;
            display: flex;
            flex-direction: column;
            z-index: 2;
        }

        .sidebar .sidebar-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .sidebar img {
            height: 60px;
            margin-right: 10px;
        }

        .sidebar h1 {
            font-size: 14px;
            color: #333;
            font-weight: bold;
            margin: 0;
        }

        .sidebar a {
            color: #333;
            text-decoration: none;
            font-size: 14px;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #0000008F;
            color: #fff;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 10px 0;
        }

        .sidebar ul li a {
            padding-left: 30px;
            font-size: 13px;
        }

        .sidebar ul li a:hover, .sidebar a.sub-active{
            width: 80%;
            background-color: #fff;
            color: #000;
        }

        /* Header */
        .header {
            background-color: white;
            padding: 5px 20px; /* Ubah padding agar navbar lebih pendek */
            height: 90px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 300px;
            right: 0;
            margin-left: 30px;
        }

        .header span {
            font-size: 20px;
            font-weight: bold;
        }

        .header p {
            font-size: 14px;
        }

        .rectangle {
            background-color: #000;
            width: 100%;
            height: 1px;
            margin-left: -15px;
            margin-bottom: 10px;
        }

        .container-fluid {
            width: 74%;
            margin-left: 370px;
            padding: 20px;
            padding-top: 130px;
        }

        .tambah {
            background-color: #92A3F5;
            color: #000;
            font-weight: bold;
        }

        .btn-aksi {
            background-color: #F2BD29A1;
            border-radius: 10px;

        }

        .btn-aksi:hover {
            background-color: #F2BD29;
        }

        .search {
            display: flex;
            flex-direction: row;
        }

        .search-input {
            width: 97%;
            padding-left: 35px;
        }

        .input-icon {
            pointer-events: none;
            position: absolute;
            left: 10px;
            width: 20px;  /* Sesuaikan ukuran ikon */
            height: 20px; /* Sesuaikan ukuran ikon */
        }

        .table{
            border: 2px solid #92A3F5;
            overflow: hidden;
        }

        .table thead{
            background-color: #92A3F5;
            color: #000;
            font-weight: bold;
        }

        /* Gaya untuk baris tabel */
        .table tbody tr {
            border-bottom: 1px solid #ddd;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Gaya untuk sel tabel */
        .table th, .table td {
            padding: 12px 15px;
        }

        /* Tambahkan garis pembatas di sebelah kanan kolom No */
        .table tbody tr td:first-child {
            border-right: 2px solid #ddd; /* Atur warna dan ketebalan garis */
        }

        .modal-header {
            display: flex;
            justify-content: center;  /* Mengatur posisi elemen secara horizontal */
            align-items: center;      /* Mengatur posisi elemen secara vertikal */
            text-align: center;       /* Menjaga agar teks tetap terpusat */
        }

        #tambahModal{
            p{
                margin-bottom: 5px;
            }

            input{
                margin-top: 0;
                border: 1px solid #000000;
                border-radius: 5px;
                box-shadow: 5px 5px 4px 0px #00000040;
            }
        }

        #tambahModal input{
            width: 100%;
            margin-bottom: 10px;
            padding-left: 10px;
            height: 30px;
            font-size: 14px;
        }

        #tambahModal input[type="radio"] {
            width: auto;   /* Mengatur lebar radio button agar tetap normal */
            height: auto;  /* Mengatur tinggi radio button agar tetap normal */
            margin-bottom: 0; /* Menghapus margin bawah untuk radio button */
            padding-left: 0;  /* Menghapus padding kiri untuk radio button */
            font-size: 14px;  /* Sesuaikan ukuran font jika diperlukan */
            border: none;
            border-radius: 0px;
            box-shadow: none;
        }

        #tambahModal .kelas{
            width: 100%;
            height: 30px;
            margin-bottom: 10px;
            padding-left: 10px;
            margin-top: 0;
            border: 1px solid #000000;
            border-radius: 5px;
            box-shadow: 5px 5px 4px 0px #00000040;
        }
    </style>
</head>
<body class="bg-light">
    <div class="sidebar-bg"></div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('images/logo-perpustakaan.png') }}" alt="Logo">
            <h1>Admin Perpustakaan <br> SMK Baitussalam Pekalongan</h1>
        </div>
        <div class="rectangle"></div>
        <a href="{{route('admin.home')}}"><i class="fas fa-home"></i> Home</a>
        <a href="#"><i class="fas fa-user"></i> Data Anggota</a>
        <ul>
            <li><a href="{{route('data-siswa')}}"><i class="fas fa-chevron-right"></i> Data Siswa</a></li>
            <li><a href="{{route('tamu')}}"><i class="fas fa-chevron-right"></i> Data Tamu</a></li>
        </ul>
        <a href="#" class="active"><i class="fas fa-book"></i> Layanan</a>
        <ul>
            <li><a href="{{route('admin.peminjaman')}}"><i class="fas fa-chevron-right"></i> Peminjaman Buku</a></li>
            <li><a href="{{route('admin.riwayat-peminjaman')}}"><i class="fas fa-chevron-right"></i> Riwayat Peminjaman</a></li>
            <li><a href="{{route('admin.reservasi')}}" class="sub-active"><i class="fas fa-chevron-right"></i> Reservasi</a></li>
            <li><a href="{{route('admin.riwayat-kunjungan')}}" ><i class="fas fa-chevron-right"></i> Riwayat Kunjungan</a></li>
        </ul>
        <a href="{{route('admin.laporan')}}"><i class="fas fa-file-alt"></i> Laporan</a>
        <a href="#"><i class="fas fa-users"></i> Organisasi</a>
        <a href="{{route('admin.login')}}"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>

    <!-- Navbar -->
    <div class="header">
        <span></span>
        <div>
            <p style="margin: 0;">Admin</p>
            <p style="margin: 0;">Admin123@gmail.com</p>
        </div>
    </div>

    <div class="container-fluid">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title centered-title" id="detailModalLabel">Tambah Data Anggota</h5>
            </div>
            <div class="modal-body row">
                <div style="padding-left: 20px; padding-right: 30px;">
                    <p>Nama</p>
                    <input type="text" class="nama-pengguna" id="nama" placeholder="Masukkan Nama">

                    <p>NIS</p>
                    <input type="number" class="judul-buku" id="nis" placeholder="Masukkan NIS">

                    <p style="margin-top: 10px;">Jenis Kelamin</p>
                    <fieldset style="margin-bottom: 10px;">
                        <input type="radio" id="male" name="jenis_kelamin" value="Laki-laki" class="jenis-kelamin">
                        <label for="male">Laki-laki</label><br>
                        
                        <input type="radio" id="female" name="jenis_kelamin" value="Perempuan" class="jenis-kelamin">
                        <label for="female">Perempuan</label><br>
                    </fieldset>

                    <p>Program Keahlian</p>
                    <input type="text" class="program-keahlian" id="program-keahlian" placeholder="Masukkan Program Keahlian">

                    <p>Kelas</p>
                    <input type="text" class="kelas" id="kelas" placeholder="Masukkan Kelas">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn border" data-bs-dismiss="modal" id="btnBatal">Batal</button>
                <button type="button" class="btn border btn-secondary" id="btnTambah">Tambah</button>
            </div>
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>