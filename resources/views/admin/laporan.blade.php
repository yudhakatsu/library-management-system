<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f9f9f9;
        }

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

        /* Card */
        .card{
            border: none;
            background-color: #f9f9f9;
        }

        .card h5 {
            font-size: 18px;
            font-weight: bold;
            color: #FFD60A;
        }

        .rectangle {
            background-color: #000;
            width: 100%;
            height: 1px;
            margin-left: -15px;
            margin-bottom: 10px;
        }

        /* Judul di luar sidebar */
        .page-title {
            left: 350px;
            top: 120px;
            font-size: 36px;
            font-weight: bold;
            color: #000; /* Warna hitam */
        }

        /* Membuat agar tombol download berada di samping kanan select */
        .download-container {
            display: flex;
            flex-direction: column;
            align-self: start;
            gap: 25px;
            margin-left: 30px;

            select{
                background-color: #F2BD29F0;
                font-weight: bold;
                border-radius: 10px;
            }

            option{
                background-color: #fff
            }

            .btn-download{
                width: 50px;
                height: 44px;
                border-radius: 10px;
                background-color: #A5A5A540;
                box-shadow: 5px 4px 4px 0px #00000040;
                font-size: 20px;
                border: none;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #000;
            }
        }

        .text-container h5 {
            display: flex;
            align-items: center; /* Untuk menyelaraskan teks secara vertikal */
            padding: 0 10px; /* Memberikan sedikit jarak kiri dan kanan */
            background-color: #F2BD29F0;
            width: 230px;
            height: 30px;
            border-radius: 10px;
            color: #000;
        }

        .c-container {
            background-color: #A5A5A540;
            border-radius: 10px;
            box-shadow: 5px 4px 4px 0px #00000040;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80px;
            
            img {
                width: 62px;
                height: auto;
                margin-right: 25px;
            }

            span{
                text-align: center;
                line-height: 1;
            }
        }

        .text-content {
            display: flex;
            flex-direction: column; /* Mengatur teks agar tersusun atas-bawah */
            text-align: center;
            padding-top: 5px;
            

            span {
                padding-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar-bg"></div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{route('admin.home')}}"><i class="fas fa-home"></i> Home</a>
        <a href="#" class="menu"><i class="fas fa-user"></i> Data Anggota</a>
        <ul>
            <li><a href="{{route('data-siswa')}}"><i class="fas fa-chevron-right"></i> Data Siswa</a></li>
            <li><a href="{{route('tamu')}}"><i class="fas fa-chevron-right"></i> Data Tamu</a></li>
        </ul>
        <a href="#" class="menu"><i class="fas fa-book"></i> Layanan</a>
        <ul>
            <li><a href="{{route('admin.peminjaman')}}"><i class="fas fa-chevron-right"></i> Peminjaman Buku</a></li>
            <li><a href="{{route('admin.riwayat-peminjaman')}}"><i class="fas fa-chevron-right"></i> Riwayat Peminjaman</a></li>
            <li><a href="{{route('admin.reservasi')}}" ><i class="fas fa-chevron-right"></i> Reservasi</a></li>
            <li><a href="{{route('admin.riwayat-kunjungan')}}" ><i class="fas fa-chevron-right"></i> Riwayat Kunjungan</a></li>
            <li><a href="{{route('admin.inventaris')}}" ><i class="fas fa-chevron-right"></i> Inventaris</a></li>
            <li><a href="{{route('admin.koleksi')}}"><i class="fas fa-chevron-right"></i> Koleksi Buku</a></li>
        </ul>
        <a href="{{route('admin.laporan')}}" class="active"><i class="fas fa-file-alt"></i> Laporan</a>
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

    <!-- Content -->
    <div class="container-fluid">
        <!-- Judul di luar Sidebar -->
        <h1 class="page-title">Laporan</h1>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <a href="{{ route('export.pdf') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </a>
            </div>
        </div>

        <!-- Reservasi Kunjungan -->
        <div class="card mb-3 p-3">
            <div class="d-flex">
                <div class="text-container">
                    <h5>Reservasi Kunjungan</h5>
                    <div class="c-container">
                        <img src="{{ asset('images/icon-kunjungan.png') }}" alt="Icon Kunjungan">
                        <div class="text-content">
                        <span id="jumlahKunjungan" class="fs-4 fw-bold">{{ $jumlahKunjungan }}</span>
                        <span>kunjungan</span>
                        </div>
                    </div>
                </div>
                <div class="download-container">
                    <form action="{{ route('admin.laporan') }}" method="GET">
                        <select id="bulanSelectKunjungan" class="form-select form-select-sm w-auto" name="bulanKunjungan" onchange="this.form.submit()">
                            <option value="01" {{ $bulanKunjungan == '01' ? 'selected' : '' }}>Januari</option>
                            <option value="02" {{ $bulanKunjungan == '02' ? 'selected' : '' }}>Februari</option>
                            <option value="03" {{ $bulanKunjungan == '03' ? 'selected' : '' }}>Maret</option>
                            <option value="04" {{ $bulanKunjungan == '04' ? 'selected' : '' }}>April</option>
                            <option value="05" {{ $bulanKunjungan == '05' ? 'selected' : '' }}>Mei</option>
                            <option value="06" {{ $bulanKunjungan == '06' ? 'selected' : '' }}>Juni</option>
                            <option value="07" {{ $bulanKunjungan == '07' ? 'selected' : '' }}>Juli</option>
                            <option value="08" {{ $bulanKunjungan == '08' ? 'selected' : '' }}>Agustus</option>
                            <option value="09" {{ $bulanKunjungan == '09' ? 'selected' : '' }}>September</option>
                            <option value="10" {{ $bulanKunjungan == '10' ? 'selected' : '' }}>Oktober</option>
                            <option value="11" {{ $bulanKunjungan == '11' ? 'selected' : '' }}>November</option>
                            <option value="12" {{ $bulanKunjungan == '12' ? 'selected' : '' }}>Desember</option>
                        </select>
                    </form>
                    <a href="#" id="btnDownloadKunjungan" class="btn-download"><i class="fas fa-download"></i></a>
                </div>
            </div>
        </div>

        <!-- Peminjaman Buku -->
        <div class="card mb-3 p-3">
            <div class="d-flex">
                <div class="text-container">
                    <h5>Peminjaman Buku</h5>
                    <div class="c-container">
                        <img src="{{ asset('images/icon-peminjaman.png') }}" alt="Icon Peminjaman">
                        <div class="text-content">
                        <span id="jumlahPeminjaman" class="fs-4 fw-bold">{{ $jumlahPeminjaman }}</span>
                        <span>peminjaman</span>
                        </div>
                    </div>
                </div>
                <div class="download-container">
                    <form action="{{ route('admin.laporan') }}" method="GET">
                        <select id="bulanSelectPeminjaman" class="form-select form-select-sm w-auto" name="bulanPeminjaman" onchange="this.form.submit()">
                            <option value="01" {{ $bulanPeminjaman == '01' ? 'selected' : '' }}>Januari</option>
                            <option value="02" {{ $bulanPeminjaman == '02' ? 'selected' : '' }}>Februari</option>
                            <option value="03" {{ $bulanPeminjaman == '03' ? 'selected' : '' }}>Maret</option>
                            <option value="04" {{ $bulanPeminjaman == '04' ? 'selected' : '' }}>April</option>
                            <option value="05" {{ $bulanPeminjaman == '05' ? 'selected' : '' }}>Mei</option>
                            <option value="06" {{ $bulanPeminjaman == '06' ? 'selected' : '' }}>Juni</option>
                            <option value="07" {{ $bulanPeminjaman == '07' ? 'selected' : '' }}>Juli</option>
                            <option value="08" {{ $bulanPeminjaman == '08' ? 'selected' : '' }}>Agustus</option>
                            <option value="09" {{ $bulanPeminjaman == '09' ? 'selected' : '' }}>September</option>
                            <option value="10" {{ $bulanPeminjaman == '10' ? 'selected' : '' }}>Oktober</option>
                            <option value="11" {{ $bulanPeminjaman == '11' ? 'selected' : '' }}>November</option>
                            <option value="12" {{ $bulanPeminjaman == '12' ? 'selected' : '' }}>Desember</option>
                        </select>
                    </form>
                    <a href="#" id="btnDownloadPeminjaman" class="btn-download"><i class="fas fa-download"></i></a>
                </div>
            </div>
        </div>

        <!-- Pemasukan Buku -->
        <div class="card mb-3 p-3">
            <div class="d-flex">
                <div class="text-container">
                    <h5>Pemasukan Buku</h5>
                    <div class="c-container">
                        <img src="{{ asset('images/icon-inventaris.png') }}" alt="Icon Inventaris">
                        <div class="text-content">
                        <span id="jumlahInventaris" class="fs-4 fw-bold">{{ $jumlahPemasukan }}</span>
                        <span>pemasukan</span>
                        </div>
                    </div>
                </div>
                <div class="download-container">
                    <form action="{{ route('admin.laporan') }}" method="GET">
                        <select id="bulanSelectPemasukan" class="form-select form-select-sm w-auto" name="bulanInventaris" onchange="this.form.submit()">
                            <option value="01" {{ $bulanPemasukan == '01' ? 'selected' : '' }}>Januari</option>
                            <option value="02" {{ $bulanPemasukan == '02' ? 'selected' : '' }}>Februari</option>
                            <option value="03" {{ $bulanPemasukan == '03' ? 'selected' : '' }}>Maret</option>
                            <option value="04" {{ $bulanPemasukan == '04' ? 'selected' : '' }}>April</option>
                            <option value="05" {{ $bulanPemasukan == '05' ? 'selected' : '' }}>Mei</option>
                            <option value="06" {{ $bulanPemasukan == '06' ? 'selected' : '' }}>Juni</option>
                            <option value="07" {{ $bulanPemasukan == '07' ? 'selected' : '' }}>Juli</option>
                            <option value="08" {{ $bulanPemasukan == '08' ? 'selected' : '' }}>Agustus</option>
                            <option value="09" {{ $bulanPemasukan == '09' ? 'selected' : '' }}>September</option>
                            <option value="10" {{ $bulanPemasukan == '10' ? 'selected' : '' }}>Oktober</option>
                            <option value="11" {{ $bulanPemasukan == '11' ? 'selected' : '' }}>November</option>
                            <option value="12" {{ $bulanPemasukan == '12' ? 'selected' : '' }}>Desember</option>
                        </select>
                    </form>
                    <a href="#" id="btnDownloadInventaris" class="btn-download"><i class="fas fa-download"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
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

            function cetakPDF(route) {
                window.location.href = route;
            }
        });

        document.getElementById('btnDownloadKunjungan').addEventListener('click', function (event) {
            event.preventDefault();
            const bulan = document.getElementById('bulanSelectKunjungan').value;
            const url = `/cetak/kunjungan?bulan=${bulan}`;
            window.location.href = url;
        });

        document.getElementById('btnDownloadPeminjaman').addEventListener('click', function (event) {
            event.preventDefault();
            const bulan = document.getElementById('bulanSelectPeminjaman').value;
            const url = `/cetak/peminjaman?bulan=${bulan}`;
            window.location.href = url;
        });

        document.getElementById('btnDownloadInventaris').addEventListener('click', function (event) {
            event.preventDefault();
            const bulan = document.getElementById('bulanSelectInventaris').value;
            const url = `/cetak/inventaris?bulan=${bulan}`;
            window.location.href = url;
        });
    </script>
    
</body>
</html>
