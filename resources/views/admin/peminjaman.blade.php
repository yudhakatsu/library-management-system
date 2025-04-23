<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
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
            transition: transform 0.3s ease;
        }

        /* Sidebar */
        .sidebar {
            background-color: #F2BD29;
            height: 100vh;
            position: fixed;
            top: 0px;
            left: 0;
            width: 300px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            padding-top: 100px;
            padding-left: 20px;
            padding-bottom: 50px;
            z-index: 2;
            transition: transform 0.3s ease;
        }

        .sidebar-header.hidden {
            transform: translateX(-110%);
        }


        .sidebar-header img {
            height: 60px;
            margin-right: 10px;
        }

        .sidebar-header h1 {
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
            display: none;
        }

        .sidebar ul.show{
            display: block;
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

        .sidebar-header img:first-child {
            width: 10px;
            height: 30px;
            cursor: pointer;
        }

        .sidebar-header img:last-child {
            width: 30px;
            margin: 0;
            padding: 0;
        }
        
        .sidebar-header .menu{
            padding: 0px;
            margin-right: 10px;
        }

        /* Tambahkan style untuk scrollbar */
        .sidebar::-webkit-scrollbar, .container-fluid::-webkit-scrollbar {
            display: block;
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-thumb, .container-fluid::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover, .container-fluid::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        .sidebar::-webkit-scrollbar-track, .container-fluid::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }

        /* Menyembunyikan sidebar */
        .sidebar.collapsed {
            transform: translateX(-300px); /* Sesuaikan dengan lebar sidebar Anda */
            transition: transform 0.3s ease-in-out;
        }

        /* Menyembunyikan background sidebar */
        .sidebar-bg.collapsed {
            transform: translateX(-300px); /* Sesuaikan dengan lebar sidebar Anda */
            transition: transform 0.3s ease-in-out;
        }

        /* Header */
        .header {
            background-color: white;
            padding: 5px 0; /* Ubah padding agar navbar lebih pendek */
            padding-right: 20px;
            height: 90px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            z-index: 10;
        }

        .sidebar-header {
            position: sticky;
            top: 0;
            z-index: 10;
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 20px 10px;
            padding-right: 25px;
            background-color:#F2BD29;
            z-index: 2;
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
            width: 70%;
            margin-left: 370px;
            padding: 20px;
            padding-top: 130px;
            transition: margin-left 0.4s ease, width 0.4s ease;
        }


        #container {
            width: 90%;
            margin-left: 100px !important;
            transition: margin-left 0.2s ease-in-out, width 0.2s ease-in-out;
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

        .tambah {
            background-color: #92A3F5;
            color: #000;
            font-weight: bold;
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

        .badge{
            color: #000;
            font-weight: 400;
            font-size: 16px;
        }

        .bg-danger {
            background-color: #FD7171BD; /* Merah muda */
            padding: 5px 10px;
            border-radius: 10px;
            display: inline-block;
        }

        .bg-success {
            background-color: #FFFF1BA1; /* Hijau muda */
            padding: 5px 10px;
            border-radius: 10px;
            display: inline-block;
        }

        .bg-warning {
            background-color: #7AD383; /* Kuning muda */
            padding: 5px 10px;
            border-radius: 10px;
            display: inline-block;
        }

        .centered-title {
            text-align: center;
            width: 100%;
            margin: 0;
        }

        #btnStatus:hover{
            filter: brightness(85%);
        }

        #btnBatal:hover{
            background-color: #6c757d;
            color: #fff;
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

        .acc-button {
            height: 35px;
            color: #000;

            option{
                color: #000;
            }
        }

        select {
            border-radius: 5px;
        }

        /* Kelas untuk masing-masing status */
        .status-diajukan {
            background-color: #ffeb3b; /* Kuning terang untuk 'Diajukan' */
        }

        .status-acc {
            background-color: #4caf50; /* Hijau untuk 'ACC' */
            color: white; /* Warna teks putih */
        }

        .status-dikembalikan {
            background-color: #f44336; /* Merah untuk 'Dikembalikan' */
            color: white; /* Warna teks putih */
        }

        /* Menambahkan efek pada tombol submit yang disable */
        .disabled {
            background-color: #dcdcdc; /* Warna tombol submit disable */
            cursor: not-allowed;
        }

        option{
            background-color: #fff;
        }
    </style>
</head>
<body class="bg-light">
    <div class="sidebar-bg"></div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{route('admin.home')}}"><i class="fas fa-home"></i> Home</a>
        <a href="#" class="menu"><i class="fas fa-user"></i> Data Anggota</a>
        <ul>
            <li><a href="{{route('data-siswa')}}"><i class="fas fa-chevron-right"></i> Data Siswa</a></li>
            <li><a href="{{route('tamu')}}"><i class="fas fa-chevron-right"></i> Data Tamu</a></li>
        </ul>
        <a href="#" class="active"><i class="fas fa-book"></i> Layanan</a>
        <ul>
            <li><a href="{{route('admin.peminjaman')}}" class="sub-active"><i class="fas fa-chevron-right"></i> Peminjaman Buku</a></li>
            <li><a href="{{route('admin.riwayat-peminjaman')}}"><i class="fas fa-chevron-right"></i> Riwayat Peminjaman</a></li>
            <li><a href="{{route('admin.reservasi')}}" ><i class="fas fa-chevron-right"></i> Reservasi</a></li>
            <li><a href="{{route('admin.riwayat-kunjungan')}}" ><i class="fas fa-chevron-right"></i> Riwayat Kunjungan</a></li>
            <li><a href="{{route('admin.inventaris')}}" ><i class="fas fa-chevron-right"></i> Inventaris</a></li>
            <li><a href="{{route('admin.koleksi')}}"><i class="fas fa-chevron-right"></i> Koleksi Buku</a></li>
        </ul>
        <a href="{{route('admin.laporan')}}"><i class="fas fa-file-alt"></i> Laporan</a>
        <a href="#"><i class="fas fa-users"></i> Organisasi</a>
        <a href="{{route('admin.login')}}"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>

    <!-- Navbar -->
    <div class="header">
        <div class="sidebar-header">
            <a href="#" class="menu"><img src="{{ asset ('images/menu.png') }}" alt="Menu"></a>
            <img src="{{ asset('images/logo-perpustakaan.png') }}" alt="Logo">
            <h1>Admin Perpustakaan <br> SMK Baitussalam Pekalongan</h1>
        </div>
        <span></span>
        <div>
            <p style="margin: 0;">Admin</p>
            <p style="margin: 0;">Admin123@gmail.com</p>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <main>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3">Peminjaman buku</h1>
                </div>

                <!-- Search -->
                <div class="search mb-3 d-flex align-items-center gap-2">
                    <div class="position-relative flex-grow-1">
                        <form action="{{ url('/admin/peminjaman') }}" method="GET">
                            <input class="search-input form-control" type="text" name="query" placeholder="Cari berdasarkan Nama" value="{{ request('query') }}">
                            <img src="{{ asset('images/search.png') }}" alt="Search Icon" class="input-icon position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%); width: 20px; cursor: pointer;">
                        </form>
                    </div>
                    <button class="btn btn-primary tambah" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</button>

                    <!-- Modal Tambah Data -->
                    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title centered-title" id="detailModalLabel">FORM PEMINJAMAN BUKU</h5>
                                </div>
                                <form action="{{ route('admin.peminjaman.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body row">
                                        <div class="col-6 px-3">
                                            <p>NIS</p>
                                            <input type="text" name="nis" id="nis" class="nis-pengguna form-control" list="nis-list" required>
                                            <datalist id="nis-list">
                                                <!-- List NIS akan diisi melalui JavaScript -->
                                            </datalist>

                                            <p>Nama Pengguna</p>
                                            <input type="text" name="nama" id="nama" class="nama-pengguna form-control" required>

                                            <p>Judul Buku</p>
                                            <input type="text" name="judul_buku" id="judulBuku" class="judul-buku form-control" list="buku-list" autocomplete="off" required>
                                            <datalist id="buku-list">

                                            </datalist>

                                            <p>Jumlah Buku</p>
                                            <input type="number"  name="jumlah_buku" id="jumlahBuku" class="jumlah-buku form-control" required min="1" value="1">
                                        </div>
                                        <div class="col-6 px-3">
                                            <p>Tanggal Pinjam</p>
                                            <input type="date" name="tanggal_pinjam" id="tanggalPinjam" class="tanggal-pinjam form-control" required>

                                            <p>Tanggal Kembali</p>
                                            <input type="date" name="tanggal_kembali" id="tanggalKembali" class="tanggal-kembali form-control" readonly required>

                                            <p>Kelas</p>
                                            <select id="kelas" name="kelas" class="kelas form-select form-select-sm" required>
                                                <option value="" disabled selected>Pilih Kelas</option>
                                                <option value="X">X</option>
                                                <option value="XI">XI</option>
                                                <option value="XII">XII</option>
                                            </select>

                                            <p>No.HP</p>
                                            <input type="text" name="no_hp" id="noHp" class="hp form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn border" data-bs-dismiss="modal" id="btnBatal">Batal</button>
                                        <button type="submit" class="btn border btn-primary" id="btnPinjam">Pinjam</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit Data -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title centered-title" id="detailModalLabel">FORM PEMINJAMAN BUKU</h5>
                                </div>
                                <form action="{{ route('admin.peminjaman.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body row">
                                        <div class="col-6 px-3">
                                            <input type="hidden" name="id" id="editId" value="">

                                            <p>NIS</p>
                                            <input type="text" name="nis" id="editnis" class="nis-pengguna form-control" list="nis-list" required>
                                            <datalist id="nis-list">
                                                <!-- List NIS akan diisi melalui JavaScript -->
                                            </datalist>

                                            <p>Nama Pengguna</p>
                                            <input type="text" name="nama" id="editnama" class="nama-pengguna form-control" required>

                                            <p>Judul Buku</p>
                                            <input type="text" name="judul_buku" id="editjudulBuku" class="judul-buku form-control" list="buku-list" autocomplete="off" required>
                                            <datalist id="buku-list">

                                            </datalist>

                                            <p>Jumlah Buku</p>
                                            <input type="number"  name="jumlah_buku" id="editjumlahBuku" class="jumlah-buku form-control" required min="1" value="1">
                                        </div>
                                        <div class="col-6 px-3">
                                            <p>Tanggal Pinjam</p>
                                            <input type="date" name="tanggal_pinjam" id="edittanggalPinjam" class="tanggal-pinjam form-control" required>

                                            <p>Tanggal Kembali</p>
                                            <input type="date" name="tanggal_kembali" id="edittanggalKembali" class="tanggal-kembali form-control" readonly required>

                                            <p>Kelas</p>
                                            <select id="editkelas" name="kelas" class="kelas form-select form-select-sm" required>
                                                <option value="" disabled selected>Pilih Kelas</option>
                                                <option value="X">X</option>
                                                <option value="XI">XI</option>
                                                <option value="XII">XII</option>
                                            </select>

                                            <p>No.HP</p>
                                            <input type="text" name="no_hp" id="editnoHp" class="hp form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn border" data-bs-dismiss="modal" id="btnBatal">Batal</button>
                                        <button type="submit" class="btn border btn-primary" id="btnPinjam">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Konfirmasi Hapus -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <!-- Form Hapus tanpa action yang langsung -->
                                    <form method="POST" id="deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" id="deleteId">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <!-- Table -->
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Judul Buku</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                            <tr>
                                <td>{{ $item['ID'] }}</td>
                                <td>{{ $item['Nama'] }}</td>
                                <td>{{ $item['Judul_Buku'] }}</td>
                                <td>
                                    <span class="badge 
                                        @if($item['Status'] == 'Diajukan') bg-warning 
                                        @elseif($item['Status'] == 'ACC') bg-success 
                                        @elseif($item['Status'] == 'Dikembalikan') bg-danger 
                                        @endif">
                                        {{ $item['Status'] }}
                                    </span>
                                </td>
                                <td>
                                    <button 
                                        class="btn btn-aksi btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#detailModal" 
                                        onclick="showDetails('{{ ($item['ID']) }}', '{{ ($item['NIS']) }}', '{{ ($item['Nama']) }}', '{{ ($item['Judul_Buku']) }}', '{{ ($item['Jumlah_Buku']) }}', '{{ ($item['Tanggal_Pinjam']) }}', '{{ ($item['Tanggal_Kembali']) }}', '{{ ($item['Kelas']) }}', '{{ ($item['No_HP']) }}', '{{ ($item['Status']) }}')">
                                        <img src="{{ asset('images/edit.png') }}" alt="">
                                    </button>
                                    <button 
                                        class="btn btn-aksi btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editModal" 
                                        onclick="populateEditModal('{{ $item['ID'] }}', '{{ $item['NIS'] }}', '{{ $item['Nama'] }}', '{{ $item['Judul_Buku'] }}', '{{ $item['Jumlah_Buku'] }}', '{{ $item['Tanggal_Pinjam'] }}', '{{ $item['Tanggal_Kembali'] }}', '{{ $item['Kelas'] }}', '{{ $item['No_HP'] }}')">
                                        Edit
                                    </button>
                                    <button 
                                        class="btn btn-danger btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal" 
                                        onclick="setDeleteData('{{ ($item['ID']) }}')">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data</td>
                            </tr>
                            @endforelse
                        </tbody>

                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title centered-title" id="detailModalLabel">Detail Peminjaman</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-6 px-3">
                                            <p>NIS Peminjam: <span id="detailNIS"></span></p>
                                            <p>Nama Peminjam: <span id="detailNama"></span></p>
                                            <p>Judul Buku: <span id="detailJudul"></span></p>
                                            <p>Jumlah Buku: <span id="detailJumlah"></span></p>
                                        </div>
                                        <div class="col-6 px-3">
                                            <p>Tanggal Pinjam: <span id="detailTglPinjam"></span></p>
                                            <p>Tanggal Kembali: <span id="detailTglKembali"></span></p>
                                            <p>Kelas: <span id="detailKelas"></span></p>
                                            <p>No.HP: <span id="detailHp"></span></p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn border" data-bs-dismiss="modal" id="btnBatal">Batal</button>
                                        <form method="POST" action="{{ route('updateStatus') }}">
                                            @csrf
                                            <input type="hidden" id="detailId" name="id"> <!-- Menyimpan ID item -->
                                            <select name="status" id="statusSelect" class="acc-button">
                                                <option value="Diajukan" {{ old('status') == 'Diajukan' ? 'selected' : '' }}>Diajukan</option>
                                                <option value="ACC" {{ old('status') == 'ACC' ? 'selected' : '' }}>ACC</option>
                                                <option value="Dikembalikan" {{ old('status') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                                            </select>
                                            <button type="submit" class="btn border" id="submitButton">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showDetails(id, nis, nama, judul, jumlah, pinjam, kembali, kelas, hp, status) {
            document.getElementById('detailId').value = id; // Set ID item ke input hidden
            document.getElementById('detailNIS').innerText = nis;
            document.getElementById('detailNama').innerText = nama;
            document.getElementById('detailJudul').innerText = judul;
            document.getElementById('detailJumlah').innerText = jumlah;
            document.getElementById('detailTglPinjam').innerText = pinjam;
            document.getElementById('detailTglKembali').innerText = kembali;
            document.getElementById('detailKelas').innerText = kelas;
            document.getElementById('detailHp').innerText = hp;

            // Set status dropdown ke status saat ini
            const statusDropdown = document.getElementById('statusSelect');
            statusDropdown.value = status; // Atur value dropdown sesuai dengan status dari database

            const submitButton = document.getElementById('submitButton');
        
           // Fungsi untuk cek status dan menerapkan warna
            function checkStatus() {
                // Hapus semua kelas sebelumnya
                statusSelect.classList.remove('status-diajukan', 'status-acc', 'status-dikembalikan');
                
                // Tambahkan kelas berdasarkan nilai status
                if (statusSelect.value === 'Diajukan') {
                    statusSelect.classList.add('status-diajukan');
                } else if (statusSelect.value === 'ACC') {
                    statusSelect.classList.add('status-acc');
                } else if (statusSelect.value === 'Dikembalikan') {
                    statusSelect.classList.add('status-dikembalikan');
                }
                
                // Disable select dan sembunyikan tombol submit jika statusnya 'Dikembalikan'
                if (statusSelect.value === 'Dikembalikan') {
                    statusSelect.disabled = true;
                    submitButton.style.display = 'inline-block';
                } else {
                    statusSelect.disabled = false;
                    submitButton.style.display = 'inline-block';
                }
            }

            // Cek status saat halaman dimuat pertama kali
            checkStatus();

            // Cek status setiap kali pilihan berubah
            statusSelect.addEventListener('change', checkStatus);
        }

        function populateEditModal(id, nis, nama, judulBuku, jumlahBuku, tanggalPinjam, tanggalKembali, kelas, noHp) {
            console.log({ id, nis, nama, judulBuku, jumlahBuku, tanggalPinjam, tanggalKembali, kelas, noHp });
            document.getElementById('editnis').value = nis;
            document.getElementById('editnama').value = nama;
            document.getElementById('editjudulBuku').value = judulBuku;
            document.getElementById('editjumlahBuku').value = jumlahBuku;
            document.getElementById('edittanggalPinjam').value = tanggalPinjam;
            document.getElementById('edittanggalKembali').value = tanggalKembali;
            document.getElementById('editkelas').value = kelas;
            document.getElementById('editnoHp').value = noHp;

            // Handle hidden input for ID
            const editForm = document.querySelector('#editModal form');
            let idInput = editForm.querySelector('input[name="id"]');
            if (!idInput) {
                idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = 'id';
                editForm.appendChild(idInput);
            }
            idInput.value = id;
        }

        function setDeleteData(id) {
            document.getElementById('deleteId').value = id;  // Mengisi id ke input hidden
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = `/admin/peminjaman/hapus/${id}`;  // Mengatur action form dengan ID yang benar
        }

        document.addEventListener("DOMContentLoaded", () => {
        const menuButton = document.querySelector('.sidebar-header .menu');
            const sidebar = document.querySelector('.sidebar');
            const sidebarBg = document.querySelector('.sidebar-bg');
            const container = document.querySelector('.container-fluid');
            const menus = document.querySelectorAll('.sidebar > a');
            const header = document.querySelector('.header');

            if (!menuButton || !sidebar || !container || !header) {
                console.error('One or more elements not found.');
                console.log({ menuButton, sidebar, container, header });
                return;
            }

            // Toggle sidebar
            menuButton.addEventListener('click', () => {
                console.log('Menu clicked!');
                sidebar.classList.toggle('collapsed');
                sidebarBg.classList.toggle('collapsed');
                container.classList.toggle('collapsed');
                header.classList.toggle('collapsed');

                // Add or remove ID from container
                if (container.id === "container") {
                    container.removeAttribute("id"); // Remove ID
                    console.log('ID "container" removed.');
                } else {
                    container.setAttribute("id", "container"); // Add ID
                    console.log('ID "container" added.');
                }

                console.log('Classes toggled:', {
                    sidebar: sidebar.className,
                    container: container.className,
                    header: header.className
                });
            });

            menus.forEach(menu => {
                const submenu = menu.nextElementSibling;
                if (submenu && submenu.tagName === 'UL') {
                    // Show submenu if sub-active exists
                    if (submenu.querySelector('.sub-active')) {
                        submenu.classList.add('show');
                    }

                    menu.addEventListener('click', function (e) {
                        e.preventDefault();
                        submenu.classList.toggle('show');
                    });
                }
            });

            // sidebar.addEventListener('click', function (e) {
            //     if (e.target.tagName === 'A') {
            //         sidebar.classList.toggle('hidden');
            //         header.classList.toggle('expanded');
            //         container.classList.toggle('expanded');
                    
            //     }
            // });
        });

        document.getElementById('nis').addEventListener('input', function () {
            const query = this.value;

            // Fetch data dari server berdasarkan input
            fetch(`/admin/peminjaman/get-users?query=${query}`)
                .then(response => response.json())
                .then(users => {
                    const dataList = document.getElementById('nis-list');
                    dataList.innerHTML = ''; // Kosongkan datalist sebelumnya

                    users.forEach(user => {
                        const option = document.createElement('option');
                        option.value = user.nis; // Set value ke NIS
                        option.textContent = `${user.nis} - ${user.nama}`;
                        dataList.appendChild(option);
                    });
                });
        });

        // Isi otomatis Nama dan Kelas ketika NIS dipilih
        document.getElementById('nis').addEventListener('change', function () {
            const selectedNIS = this.value;

            // Fetch data pengguna berdasarkan NIS yang dipilih
            fetch(`/admin/peminjaman/get-users?query=${selectedNIS}`)
                .then(response => response.json())
                .then(users => {
                    if (users.length > 0) {
                        document.getElementById('nama').value = users[0].nama;
                        document.getElementById('kelas').value = users[0].kelas;
                    }
                });
        });

        document.getElementById('tanggalPinjam').addEventListener('change', function () {
            const tanggalPinjam = new Date(this.value); // Ambil nilai tanggal pinjam
            const tanggalKembali = new Date(tanggalPinjam); // Salin tanggal pinjam

            // Tambahkan 7 hari ke tanggal pinjam
            tanggalKembali.setDate(tanggalKembali.getDate() + 7);

            // Format tanggal kembali ke string (yyyy-mm-dd)
            const tahun = tanggalKembali.getFullYear();
            const bulan = String(tanggalKembali.getMonth() + 1).padStart(2, '0');
            const hari = String(tanggalKembali.getDate()).padStart(2, '0');
            const formattedTanggalKembali = `${tahun}-${bulan}-${hari}`;

            // Set nilai pada input tanggal kembali
            document.getElementById('tanggalKembali').value = formattedTanggalKembali;
        });

        // Menambahkan event listener pada input judul buku
        document.getElementById('judulBuku').addEventListener('input', function() {
            let query = this.value; // Ambil nilai input pengguna

            // Jika query tidak kosong
            if (query.length > 2) { // Bisa sesuaikan dengan panjang minimal input
                fetch(`/admin/peminjaman/search-buku?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        let datalist = document.getElementById('buku-list');
                        datalist.innerHTML = ''; // Hapus isi datalist sebelumnya

                        // Tambahkan data hasil pencarian ke dalam datalist
                        data.forEach(buku => {
                            let option = document.createElement('option');
                            option.value = buku.judul; // Set value option dengan judul buku
                            datalist.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        });

    </script>
</body>
</html>
