<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman</title>
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
            background-color: #7AD383; /* Hijau muda */
            padding: 5px 10px;
            border-radius: 10px;
            display: inline-block;
        }

        .bg-warning {
            background-color: #FFFF1BA1; /* Kuning muda */
            padding: 5px 10px;
            border-radius: 10px;
            display: inline-block;
        }

        td.nama-column {
            text-align: left; /* Khusus kolom 'Nama' */
        }

        th, td {
            border: 1px solid rgb(61, 77, 161);
            padding: 5px;
            text-align: center;
        }

        .search-from{
            max-height: 40px;
            max-width: 40%;
            padding-right: 15px;

            button {
                margin-right: 10px;
            }

            a{
                font-size: 12px;
                line-height: 12px;
            }
        }

        .text-center {
            font-size: 24px;
            font-style: italic;
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
            <li><a href="{{route('admin.peminjaman')}}"><i class="fas fa-chevron-right"></i> Peminjaman Buku</a></li>
            <li><a href="{{route('admin.riwayat-peminjaman')}}"><i class="fas fa-chevron-right"></i> Riwayat Peminjaman</a></li>
            <li><a href="{{route('admin.reservasi')}}" ><i class="fas fa-chevron-right"></i> Reservasi</a></li>
            <li><a href="{{route('admin.riwayat-kunjungan')}}" class="sub-active"><i class="fas fa-chevron-right"></i> Riwayat Kunjungan</a></li>
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
                    <h1 class="h3">Riwayat Kunjungan</h1>
                    <form action="{{ route('admin.riwayat-kunjungan') }}" method="GET" class="d-flex search-from">
                        <input type="date" name="tanggal" class="form-control me-2" value="{{ request('tanggal') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        @if(request('tanggal'))
                            <a href="{{ route('admin.riwayat-kunjungan') }}" class="btn btn-secondary">Tampilkan Semua</a>
                        @endif
                    </form>
                </div>

                 <!-- Table -->
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas/Jurusan</th>
                                <th>Tanggal Masuk</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataKunjungan as $kunjungan)
                            <tr>
                                <td>{{ $kunjungan['NIS'] ?? '-' }}</td>
                                <td class="nama-column">{{ $kunjungan['Nama'] }}</td>
                                <td>{{ $kunjungan['Kelas_Jurusan'] ?? '-' }}</td>
                                <td>{{ $kunjungan['Tanggal'] }}</td>
                                <td>{{ $kunjungan['Status'] }}</td>
                                <td>{{ $kunjungan['Ket'] }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
    </script>
</body>
</html>
