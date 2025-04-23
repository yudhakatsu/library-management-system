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

        .h3{
            display: flex;
            top: 0px;
        }

        .modal-header {
            display: flex;
            justify-content: center;  /* Mengatur posisi elemen secara horizontal */
            align-items: center;      /* Mengatur posisi elemen secara vertikal */
            text-align: center;       /* Menjaga agar teks tetap terpusat */
        }

        form{
            border: 2px solid #000;
            border-radius: 10px;
            padding: 10px;
            width: 70%;

            label{
                font-size: 14px;
            }

            .form-control, .form-select{
                height: 30px;
                font-size: 14px;
            }
        }

        #btnBatal{
            margin-right: 10px;
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
            <li><a href="{{route('admin.reservasi')}}" class="sub-active"><i class="fas fa-chevron-right"></i> Reservasi</a></li>
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
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">Reservasi Kunjungan</h1>
        </div>
        <div class="modal-content d-flex justify-content-center align-items-center">
            <form action="{{ route('admin.reservasi.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title centered-title" id="detailModalLabel">Form Reservasi Kunjungan</h5>
                </div>
                <div style="padding-left: 20px; padding-right: 30px;">
                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="Siswa">Siswa</option>
                            <option value="Tamu">Tamu</option>
                        </select>
                    </div>

                    <!-- NIS -->
                    <div class="mb-3" id="nisDiv">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" name="nis" id="nis" class="form-control" placeholder="Masukkan NIS" list="nis-list">
                        <datalist id="nis-list">
                            <!-- List NIS akan diisi melalui JavaScript -->
                        </datalist>
                    </div>

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama">
                    </div>

                    <!-- Kelas/Jurusan -->
                    <div class="mb-3" id="kelasDiv">
                        <label for="kelas" class="form-label">Kelas/Jurusan</label>
                        <input type="text" name="kelas_jurusan" id="kelas_jurusan" class="form-control" placeholder="Masukkan Kelas/Jurusan">
                    </div>

                    <!-- Tanggal -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" readonly>
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" name="ket" id="ket" class="form-control" placeholder="Masukkan Keterangan">
                    </div>
                    <!-- Buttons -->
                    <div class="modal-footer">
                        <button type="button" class="btn border" data-bs-dismiss="modal" id="btnBatal">Batal</button>
                        <button type="submit" class="btn border btn-secondary" id="btnTambah">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
            window.location.reload(); // Reload halaman
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Elemen-elemen DOM
            const statusSelect = document.getElementById('status'); // Dropdown Status
            const nisDiv = document.getElementById('nisDiv'); // Div untuk NIS
            const kelasDiv = document.getElementById('kelasDiv'); // Div untuk Kelas/Jurusan
            const tanggalInput = document.getElementById('tanggal'); // Input Tanggal

            // Fungsi untuk mengatur visibilitas NIS dan Kelas/Jurusan
            const toggleFields = () => {
                if (statusSelect.value === 'Siswa') { // Jika Status adalah Siswa
                    nisDiv.style.display = 'block'; // Tampilkan NIS
                    kelasDiv.style.display = 'block'; // Tampilkan Kelas/Jurusan
                } else if (statusSelect.value === 'Tamu') { // Jika Status adalah Tamu
                    nisDiv.style.display = 'none'; // Sembunyikan NIS
                    kelasDiv.style.display = 'none'; // Sembunyikan Kelas/Jurusan
                }
            };

            // Fungsi untuk menetapkan tanggal saat ini sebagai nilai default
            const setCurrentDate = () => {
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0'); // Bulan dalam format 2 digit
                const day = String(today.getDate()).padStart(2, '0'); // Hari dalam format 2 digit
                tanggalInput.value = `${year}-${month}-${day}`; // Format YYYY-MM-DD
            };

            // Jalankan fungsi-fungsi pada saat halaman dimuat
            toggleFields(); // Atur visibilitas berdasarkan status
            setCurrentDate(); // Tetapkan tanggal saat ini

            // Event Listener untuk dropdown status
            statusSelect.addEventListener('change', toggleFields);

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
        });

        document.getElementById('nis').addEventListener('input', function () {
            const query = this.value;

            // Fetch data dari server berdasarkan input
            fetch(`/admin/reservasi/get-users?query=${query}`)
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
            fetch(`/admin/reservasi/get-users?query=${selectedNIS}`)
                .then(response => response.json())
                .then(users => {
                    if (users.length > 0) {
                        document.getElementById('nama').value = users[0].nama;
                        document.getElementById('kelas_jurusan').value = `${users[0].kelas} - ${users[0].Program_Keahlian}`;
                    }
                });
        });
    </script>
</body>
</html>