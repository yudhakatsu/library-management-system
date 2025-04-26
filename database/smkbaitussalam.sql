-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Apr 2025 pada 09.30
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkbaitussalam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `jumlah_stok` int(11) NOT NULL DEFAULT 0,
  `jumlah_terpinjam` int(11) NOT NULL DEFAULT 0,
  `gambar_sampul` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `kategori`, `deskripsi`, `jumlah_stok`, `jumlah_terpinjam`, `gambar_sampul`) VALUES
(1, 'Akuntansi Keuangan C3 Kelas XI', 'Dra.Dwi Harti , M.Pd', 'Erlangga', '2017', 'Ilmu Terapan', 'Akuntansi Keuangan C3 Kelas XI merupakan buku pelajaran yang dirancang khusus untuk siswa kelas XI sesuai dengan Kurikulum Merdeka. Buku ini mencakup materi akuntansi tingkat lanjutan yang meliputi konsep dasar akuntansi, penyusunan laporan keuangan perusahaan jasa dan dagang, serta pengelolaan keuangan yang efektif.', 24, 0, 'public/images/gambar_sampul_1.jpg'),
(2, 'Desain Media Interaktif XII C3', 'Rudi Nurcahyo, S.Kom', 'Liniswara', '2019', 'Ilmu Terapan', '...', 10, 0, NULL),
(3, 'Bisnis Online XI C3', 'Fatkhul A. dan Umar S', 'Bumi Aksara', '2020', 'Ilmu Terapan', '...', 15, 0, NULL),
(4, 'Administrasi Pajak XII C3', 'Dra.Dwi Harti , M.Pd', 'Bumi Aksara', '2019', 'Ilmu Terapan', '...', 10, 0, NULL),
(5, 'Pembuatan Busana: Custome Made XII C3', 'Penulis', 'Quantum Book', '2020', 'Ilmu Terapan', '...', 15, 0, NULL),
(6, 'Moga Bunda Disayang Allah', 'Tere Liye', 'Republika', '2006', 'Kesusasteraan', '...', 10, 0, NULL),
(7, 'Fiqih Islam', 'Sulaiman Rasjid', 'Bandung : Sinar Baru Algensindo', '2016', 'Agama', '...', 15, 0, NULL),
(8, 'Pergi', 'Tere Liyes dan Sarippudin', 'Republika', '2018', 'Kesusasteraan', '...', 10, 0, NULL),
(9, 'Strategi Aman Berbisnis Sukses', 'Fadilah Ibnu Sidiq Al-Qadiri', 'Surya Media', '2009', 'Ilmu Sosial', '...', 15, 0, NULL),
(10, 'Komet', 'Tere Liye', 'Gramedia Pustaka', '2018', 'Kesusasteraan', '...', 10, 0, NULL),
(11, 'Chef Kecil : Buku Masak Untuk Anak', 'Telvenia A. Gusnaeni', 'Erlangga', '2009', 'Ilmu Terapan', '...', 15, 0, NULL),
(12, 'Menjadi Kreatif di Dunia Kreatif', 'Mira Lesmana', 'Erlangga', '2021', 'Seni dan Olahraga', '...', 10, 0, NULL),
(13, 'Asrama diatas Haram', 'Zulkifli L. Muchdi', 'Penerbit Erlangga', '2012', 'Kesusasteraan', 'Deskripsi belum tersedia', 2, 0, 'public/images/gambar_sampul_13.jpg'),
(14, 'Muslimah teladan sepanjang sejarah', 'Muhamad Zain · Hj. Wahyu Elfina dkk', 'Erlangga', '2016', 'Agama', 'Deskripsi belum tersedia', 20, 0, 'public/images/gambar_sampul_14.jpg'),
(15, 'ibu', 'alya', 'erlangga', '2020', 'Kesusasteraan', 'Deskripsi belum tersedia', 3, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `ID` int(11) NOT NULL,
  `Sumber` varchar(100) NOT NULL,
  `Tanggal_Masuk` date NOT NULL,
  `Pengarang` varchar(100) NOT NULL,
  `Judul_Buku` varchar(200) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `Penerbit` varchar(50) NOT NULL,
  `Tempat_Terbit` varchar(100) NOT NULL,
  `Tahun_Terbit` year(4) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Penerima` varchar(100) NOT NULL,
  `gambar_sampul` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`ID`, `Sumber`, `Tanggal_Masuk`, `Pengarang`, `Judul_Buku`, `kategori`, `Penerbit`, `Tempat_Terbit`, `Tahun_Terbit`, `Jumlah`, `Penerima`, `gambar_sampul`) VALUES
(1, 'BBC NEWS Indonesia', '2024-12-29', 'Dra.Dwi Harti , M.Pd', 'Akuntansi Keuangan C3 Kelas XI', 'Ilmu Terapan', 'Erlangga', 'Jakarta', '2017', 2, 'Dwi Alya Artika', NULL),
(2, 'BBC NEWS Indonesia', '2024-12-29', 'Dra.Dwi Harti , M.Pd', 'Akuntansi Keuangan C3 Kelas XI', 'Ilmu Terapan', 'Erlangga', 'Jakarta', '2017', 2, 'Dwi Alya', NULL),
(3, 'BBC NEWS Indonesia', '2024-12-29', 'Dra.Dwi Harti , M.Pd', 'Akuntansi Keuangan C3 Kelas XI', 'Ilmu Terapan', 'Erlangga', 'Jakarta', '2017', 2, 'Dwi Alya', NULL),
(5, 'Donasi', '2024-12-31', 'Zulkifli L. Muchdi', 'Asrama diatas Haram', 'Kesusasteraan', 'Penerbit Erlangga', 'Jakarta', '2012', 2, 'Bu Lina', 'public/images/7RLdr87iAgO3bW5CDlVC1GqIZPx8Wna7iBE2RB9O.jpg'),
(6, 'Donasi', '2025-01-03', 'Muhamad Zain · Hj. Wahyu Elfina dkk', 'Muslimah teladan sepanjang sejarah', 'Agama', 'Erlangga', 'Jakarta', '2016', 20, 'Bu Lina', NULL),
(7, 'Donasi', '2025-01-02', 'alya', 'ibu', 'Kesusasteraan', 'erlangga', 'jakarta', '2020', 3, 'bu lina', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `ID` int(11) NOT NULL,
  `NIS` varchar(10) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Judul_Buku` varchar(100) NOT NULL,
  `Jumlah_Buku` int(11) NOT NULL,
  `Tanggal_Pinjam` date NOT NULL,
  `Tanggal_Kembali` date NOT NULL,
  `Kelas` varchar(50) NOT NULL,
  `No_HP` varchar(13) NOT NULL,
  `Status` enum('Diajukan','ACC','Dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman_buku`
--

INSERT INTO `peminjaman_buku` (`ID`, `NIS`, `Nama`, `Judul_Buku`, `Jumlah_Buku`, `Tanggal_Pinjam`, `Tanggal_Kembali`, `Kelas`, `No_HP`, `Status`) VALUES
(1, '5410', 'Abdul Mu’iz', 'Akuntansi Keuangan C3 Kelas XI', 1, '2024-12-21', '2024-12-28', 'X', '0895634693013', 'Dikembalikan'),
(2, '5410', 'Abdul Mu’iz', 'Akuntansi Keuangan C3 Kelas XI', 1, '2024-12-21', '2024-12-28', 'X', '0895634693013', 'ACC'),
(3, '5424', 'Naura Safira', 'Menjadi Kreatif di Dunia Kreatif', 1, '2024-12-27', '2025-01-03', 'XI', '0895634693013', 'ACC'),
(8, '5424', 'Naura Safira', 'Bisnis Online XI C3', 1, '2024-12-28', '2025-01-04', 'XI', '0895634693013', 'ACC'),
(9, '5412', 'Ananda Teguh Firmansyah', 'Menjadi Kreatif di Dunia Kreatif', 1, '2024-12-29', '2025-01-05', 'XI', '0895634693013', 'ACC'),
(10, '5412', 'Ananda Teguh Firmansyah', 'Akuntansi Keuangan C3 Kelas XI', 1, '2024-12-30', '2025-01-06', 'XI', '082326103281', 'ACC'),
(11, '5412', 'Ananda Teguh Firmansyah', 'Akuntansi Keuangan C3 Kelas XI', 2, '2024-12-30', '2025-01-06', 'XI', '082326103281', 'Diajukan'),
(12, '5412', 'Ananda Teguh Firmansyah', 'Desain Media Interaktif XII C3', 3, '2024-12-31', '2025-01-07', 'XI', '082326103281', 'Diajukan'),
(13, '5413', 'Aulia Novita Ayu Safitri', 'Pergi', 1, '2024-12-31', '2025-01-07', 'XI', '09123789087', 'Diajukan'),
(14, '5413', 'Aulia Novita Ayu Safitri', 'Pergi', 1, '2024-12-31', '2025-01-07', 'XI', '7651239870', 'ACC'),
(16, '5413', 'Aulia Novita Ayu Safitri', 'Fiqih Islam', 1, '2025-01-02', '2025-01-09', 'XI', '09123789087', 'ACC'),
(17, '5413', 'Aulia Novita Ayu Safitri', 'Akuntansi Keuangan C3 Kelas XI', 1, '2025-01-01', '2025-01-08', 'XI', '12345432123', 'Diajukan'),
(18, '5411', 'Ahmad Fahrizaa', 'Muslimah teladan sepanjang sejarah', 1, '2025-04-26', '2025-05-03', 'XI', '089434693013', 'Diajukan'),
(19, '5411', 'Ahmad Fahrizaa', 'Akuntansi Keuangan C3 Kelas XI', 1, '2025-04-28', '2025-05-05', 'XI', '089434693013', 'Diajukan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian_buku`
--

CREATE TABLE `pengembalian_buku` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Judul_Buku` varchar(100) NOT NULL,
  `Status` enum('Diajukan','ACC','Dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_kunjungan`
--

CREATE TABLE `riwayat_kunjungan` (
  `ID` int(11) NOT NULL,
  `NIS` int(11) DEFAULT NULL,
  `Nama` varchar(100) NOT NULL,
  `Kelas_Jurusan` varchar(50) DEFAULT NULL,
  `Tanggal` date NOT NULL,
  `Status` enum('Siswa','Tamu') NOT NULL,
  `Ket` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat_kunjungan`
--

INSERT INTO `riwayat_kunjungan` (`ID`, `NIS`, `Nama`, `Kelas_Jurusan`, `Tanggal`, `Status`, `Ket`) VALUES
(9, NULL, 'Alya', NULL, '2024-12-15', 'Tamu', 'Mahasiswa'),
(10, NULL, 'Handiyudha Dwiky Dharmawan', NULL, '2024-12-15', 'Tamu', 'Admin Idol'),
(11, NULL, 'anggra', NULL, '2024-12-16', 'Tamu', 'Mahasiswa'),
(12, NULL, 'anggra', NULL, '2024-12-20', 'Tamu', 'mahasiswa'),
(13, 5411, 'Ahmad Fahriza', 'XI - Akuntansi & Keuangan Lembaga', '2024-12-27', 'Siswa', 'berkunjung'),
(14, 5426, 'Risma Andriyani', 'XI - Akuntansi & Keuangan Lembaga', '2024-12-30', 'Siswa', 'Siswa'),
(15, 5419, 'Jamaludin', 'XI - Akuntansi & Keuangan Lembaga', '2025-01-02', 'Siswa', 'Pembelajaran bahasa indonesia'),
(16, NULL, 'Amanda', NULL, '2025-01-02', 'Tamu', 'Mahasiswa telkom'),
(17, 5411, 'Ahmad Fahrizaa', 'XI - Akuntansi & Keuangan Lembaga', '2025-01-02', 'Siswa', 'belajar'),
(18, NULL, 'alyaartika', NULL, '2025-01-02', 'Tamu', 'mahasiswaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_peminjaman`
--

CREATE TABLE `riwayat_peminjaman` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `Judul_Buku` varchar(100) NOT NULL,
  `Tanggal_Pinjam` date NOT NULL,
  `Tanggal_Kembali` date NOT NULL,
  `Status` enum('Sedang dipinjam','Selesai','Terlambat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat_peminjaman`
--

INSERT INTO `riwayat_peminjaman` (`id`, `nis`, `nama`, `Judul_Buku`, `Tanggal_Pinjam`, `Tanggal_Kembali`, `Status`) VALUES
(1, 5410, 'Abdul Mu’iz', 'Akuntansi Keuangan C3 Kelas XI', '2024-12-21', '2024-12-28', 'Terlambat'),
(2, 5410, 'Abdul Mu’iz', 'Akuntansi Keuangan C3 Kelas XI', '2024-12-21', '2024-12-28', 'Sedang dipinjam'),
(3, 5424, 'Naura Safira', 'Menjadi Kreatif di Dunia Kreatif', '2024-12-27', '2025-01-03', 'Sedang dipinjam'),
(8, 5424, 'Naura Safira', 'Bisnis Online XI C3', '2024-12-28', '2025-01-04', 'Sedang dipinjam'),
(10, 5412, 'Ananda Teguh Firmansyah', 'Akuntansi Keuangan C3 Kelas XI', '2024-12-30', '2025-01-06', 'Sedang dipinjam'),
(14, 5413, 'Aulia Novita Ayu Safitri', 'Pergi', '2024-12-31', '2025-01-07', 'Sedang dipinjam'),
(15, 5417, 'Fika Aulia Putri', 'Ayah', '2024-12-31', '2025-01-07', 'Terlambat'),
(16, 5413, 'Aulia Novita Ayu Safitri', 'Fiqih Islam', '2025-01-02', '2025-01-09', 'Sedang dipinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `NIS` int(11) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Jenis_Kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `Program_Keahlian` varchar(100) NOT NULL,
  `Kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`NIS`, `Password`, `Nama`, `Jenis_Kelamin`, `Program_Keahlian`, `Kelas`) VALUES
(5411, 'siswa123', 'Ahmad Fahrizaa', 'Laki-Laki', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5412, 'siswa123', 'Ananda Teguh Firmansyah', 'Laki-Laki', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5413, 'siswa123', 'Aulia Novita Ayu Safitri', 'Perempuan', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5414, 'siswa123', 'Aura Azzahra', 'Perempuan', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5415, 'siswa123', 'Danar Maunana Efendy', 'Laki-Laki', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5416, 'siswa123', 'Fajar Mechdi Aristianto', 'Laki-Laki', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5417, 'siswa123', 'Fika Aulia Putri', 'Perempuan', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5418, 'siswa123', 'Gita Nafisa', 'Perempuan', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5419, 'siswa123', 'Jamaludin', 'Laki-Laki', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5420, 'siswa123', 'Muhammad Izzul Khaq', 'Laki-Laki', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5421, 'siswa123', 'Muhammad Nova Iqbal', 'Laki-Laki', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5422, 'siswa123', 'Muhammad Subhan Firdaus', 'Laki-Laki', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5423, 'siswa123', 'Najwa Nadina', 'Perempuan', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5424, 'siswa123', 'Naura Safira', 'Perempuan', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5425, 'siswa123', 'Nur Sofia Jasmin', 'Perempuan', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5426, 'siswa123', 'Risma Andriyani', 'Perempuan', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5427, 'siswa123', 'Sahma Azzahra', 'Perempuan', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5428, 'siswa123', 'Salma Laela Karimah', 'Perempuan', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5429, 'siswa123', 'Setiyo Saputra', 'Laki-Laki', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5430, 'siswa123', 'Vivi Widya', 'Perempuan', 'Akuntansi & Keuangan Lembaga', 'XI'),
(5431, 'siswa123', 'Adhisty Ramadhany', 'Perempuan', 'Pemasaran', 'XI'),
(5432, 'siswa123', 'Aliazah Mufida Rona', 'Perempuan', 'Pemasaran', 'XI'),
(5433, 'siswa123', 'Annisa Arzaqina', 'Perempuan', 'Pemasaran', 'XI'),
(5434, 'siswa123', 'Baron Prasetyo', 'Laki-Laki', 'Pemasaran', 'XI'),
(5466, 'siswa123', 'Agus Wahyono', 'Laki-Laki', 'Desain Komunikasi Visual', 'XI'),
(5467, 'siswa123', 'Ahmad Adib Ahnaf', 'Laki-Laki', 'Desain Komunikasi Visual', 'XI'),
(5510, 'siswa123', 'Ana Sofiyana', 'Perempuan', 'Busana', 'XI');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `riwayat_kunjungan`
--
ALTER TABLE `riwayat_kunjungan`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `riwayat_kunjungan`
--
ALTER TABLE `riwayat_kunjungan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
