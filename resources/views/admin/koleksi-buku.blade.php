<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            margin-left: 80px !important;
            transition: margin-left 0.2s ease-in-out, width 0.2s ease-in-out;
        }

        .tambah {
            background-color: #92A3F5;
            color: #000;
            font-weight: bold;
        }

        .btn-aksi {
            background-color: #F2BD29A1;
            border-radius: 10px;
            margin-bottom: 10px;

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
            <li><a href="{{route('admin.riwayat-kunjungan')}}" ><i class="fas fa-chevron-right"></i> Riwayat Kunjungan</a></li>
            <li><a href="{{route('admin.inventaris')}}" ><i class="fas fa-chevron-right"></i> Inventaris</a></li>
            <li><a href="{{route('admin.koleksi')}}" class="sub-active"><i class="fas fa-chevron-right"></i> Koleksi Buku</a></li>
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
                    <h1 class="h3">Koleksi Buku</h1>
                </div>

                <!-- Search -->
                <div class="search mb-3 d-flex align-items-center gap-2">
                    <div class="position-relative flex-grow-1">
                        <form action="{{ url('/admin/koleksi-buku') }}" method="GET">
                            <input class="search-input form-control" type="text" name="query" placeholder="Cari berdasarkan Judul, Pengarang, atau Kategori" value="{{ request('query') }}">
                            <img src="{{ asset('images/search.png') }}" alt="Search Icon" class="input-icon position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%); width: 20px; cursor: pointer;">
                        </form>
                    </div>
                </div>

                <!-- Modal Konfirmasi Delete -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                <!-- Tempat debug data -->
                                <p><strong>Detail Buku:</strong></p>
                                <ul>
                                    <li><strong>ID:</strong> <span id="debugID"></span></li>
                                    <li><strong>Judul:</strong> <span id="debugJudul"></span></li>
                                    <li><strong>Penulis:</strong> <span id="debugPenulis"></span></li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn border" data-bs-dismiss="modal">Batal</button>
                                <form id="formDelete" method="POST" action="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" id="btnDeleteConfirm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Data -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title centered-title" id="editModalLabel">Edit Data Anggota</h5>
                            </div>
                            <div class="modal-body row">
                                <div style="padding-left: 20px; padding-right: 30px;">
                                    <form id="editForm" method="POST" action="{{ route('admin.koleksi-update') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body row">
                                            <div class="col-md-6" style="padding-left: 20px; padding-right: 30px;">
                                                <input type="hidden" name="id" id="editID">

                                                <p>Judul Buku</p>
                                                <input type="text" id="editJudulBuku" class="form-control" name="judul" placeholder="Masukkan Judul Buku" required>

                                                <p>Penulis</p>
                                                <input type="text" id="editPengarang" class="form-control" name="penulis" placeholder="Masukkan Nama Penulis" required>

                                                <p>Penerbit</p>
                                                <input type="text" id="editPenerbit" class="form-control" name="penerbit" placeholder="Masukkan Penerbit" required>

                                                <p>Tahun Terbit</p>
                                                <input type="text" id="editTahunTerbit" class="form-control" name="tahun_terbit" placeholder="Masukkan Tahun Terbit" required>
                                            </div>
                                            <div class="col-md-6" style="padding-left: 20px; padding-right: 30px;">
                                                <p>Kategori</p>
                                                <select id="editKategori" class="form-control" name="kategori" required>
                                                    <option value="" disabled selected>Pilih Kategori</option>
                                                    <option value="Agama">Agama</option>
                                                    <option value="Ilmu Terapan">Ilmu Terapan</option>
                                                    <option value="Ilmu Murni">Ilmu Murni</option>
                                                    <option value="Filsafat">Filsafat</option>
                                                    <option value="Karya Umum">Karya Umum</option>
                                                    <option value="Ilmu Sosial">Ilmu Sosial</option>
                                                    <option value="Bahasa">Bahasa</option>
                                                    <option value="Kesusasteraan">Kesusasteraan</option>
                                                    <option value="Sejarah & Geografis">Sejarah & Geografis</option>
                                                    <option value="Seni dan Olahraga">Seni dan Olahraga</option>
                                                </select>

                                                <p>Deskripsi</p>
                                                <input type="text" id="editDeskripsi" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi Buku" required>

                                                <p>Jumlah Stok</p>
                                                <input type="number" id="editJumlahStok" class="form-control" name="jumlah_stok" placeholder="Masukkan Jumlah Stok" required>

                                                <p>Gambar Sampul</p>
                                                <input type="file" id="editGambarSampul" class="form-control" name="gambar_sampul">
                                                <img id="previewGambarSampul" src="" alt="Preview Gambar Sampul" style="max-width: 100%; display: none; margin-top: 10px;">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn border" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn border btn-secondary" id="btnUpdate">Update</button>
                                        </div>
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
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Sampul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $buku)
                            <tr>
                                <td>{{ $buku['id'] }}</td>
                                <td style="width: 200px">{{ $buku['judul'] }}</td>
                                <td>{{ $buku['penulis'] }}</td>
                                <td>{{ $buku['kategori'] }}</td>
                                <td style="width: 300px">{{ \Illuminate\Support\Str::limit($buku['deskripsi'], 100, '...') }}</td>
                                <td>
                                    <img src="{{ $buku['gambar_sampul'] ? Storage::url( $buku['gambar_sampul']) : asset('images/No_Cover.jpg') }}" alt="Gambar Sampul" style="width: 80px; height: auto;">
                                </td>
                                <td style="margin: 10px">
                                <button style="margin-bottom: 10px;" class="btn btn-aksi btn-sm btn-edit"
                                        data-id="{{ $buku['id'] }}"
                                        data-judul_buku="{{ $buku['judul'] }}"
                                        data-penulis="{{ $buku['penulis'] }}"
                                        data-penerbit="{{ $buku['penerbit'] }}"
                                        data-tahun_terbit="{{ $buku['tahun_terbit'] }}"
                                        data-jumlah="{{ $buku['jumlah_stok'] }}"
                                        data-jumlah_terpinjam="{{ $buku['jumlah_terpinjam'] }}"
                                        data-deskripsi="{{ $buku['deskripsi'] }}"
                                        data-kategori="{{ $buku['kategori'] ?? '' }}"
                                        data-gambar_sampul="{{ $buku['gambar_sampul'] ?? '' }}">
                                        <img src="{{ asset('images/edit.png') }}" alt="Edit">
                                    </button>                                    
                                    <button class="btn btn-aksi btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal"><img src="{{asset('images/deleted.png')}}" alt="Delete"></button>
                                </td>
                            </tr>
                            @endforeach
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
            let selectedID = null;

           // Handle Edit Button Click
            document.querySelectorAll(".btn-edit").forEach(button => {
                button.addEventListener("click", () => {
                    // Ambil data dari atribut data-*
                    const id = button.dataset.id;
                    const judul = button.dataset.judul_buku;
                    const penulis = button.dataset.penulis;
                    const penerbit = button.dataset.penerbit;
                    const tahunTerbit = button.dataset.tahun_terbit;
                    const kategori = button.dataset.kategori;
                    const deskripsi = button.dataset.deskripsi;
                    const jumlahStok = button.dataset.jumlah;
                    const jumlahTerpinjam = button.dataset.jumlah_terpinjam;
                    const gambarSampul = button.dataset.gambar_sampul;

                    // Isi nilai ke input modal
                    document.getElementById("editID").value = id;
                    document.getElementById("editJudulBuku").value = judul;
                    document.getElementById("editPengarang").value = penulis;
                    document.getElementById("editPenerbit").value = penerbit;
                    document.getElementById("editTahunTerbit").value = tahunTerbit;
                    document.getElementById("editKategori").value = kategori;
                    document.getElementById("editDeskripsi").value = deskripsi;
                    document.getElementById("editJumlahStok").value = jumlahStok;

                    // Setel gambar sampul
                    const gambarSampulInput = document.getElementById("editGambarSampul");
                    const gambarPreview = document.getElementById("previewGambarSampul");
                    if (gambarPreview) {
                        gambarPreview.src = gambarSampul ? gambarSampul : ""; // Tampilkan gambar jika tersedia
                        gambarPreview.style.display = gambarSampul ? "block" : "none"; // Sembunyikan jika tidak ada gambar
                    }

                    // Tampilkan modal
                    const editModal = new bootstrap.Modal(document.getElementById("editModal"));
                    editModal.show();
                });
            });

            // Handle Delete Button Click
            document.querySelectorAll(".btn-delete").forEach(button => {
                button.addEventListener("click", (event) => {
                    const row = event.target.closest("tr");
                    selectedID = row.querySelector("td:nth-child(1)").innerText; // Ambil ID dari baris
                    const nama = row.querySelector("td:nth-child(2)").innerText; // Ambil Nama dari baris
                    const deskripsi = row.querySelector("td:nth-child(3)").innerText; // Ambil Deskripsi dari baris

                    // Isi data debug di modal
                    document.getElementById("debugID").innerText = selectedID;
                    document.getElementById("debugJudul").innerText = nama;
                    document.getElementById("debugPenulis").innerText = deskripsi;

                    // Set action URL pada form delete
                    const form = document.getElementById("formDelete");
                    form.action = `/admin/delete-invent/${selectedID}`;

                    // Tampilkan modal
                    const deleteModal = new bootstrap.Modal(document.getElementById("deleteModal"));
                    deleteModal.show();
                });
            });

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