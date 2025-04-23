@extends('layouts.app')

@section('content')
<div class="form-container">
    <!-- Judul Halaman -->
    <div class="section-title">
        <h4>ISI FORM PEMINJAMAN</h4>
    </div>

    <form action="{{ route('peminjaman-store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Pengguna</label>
            <input type="text" id="nama" name="nama" value="{{ $user->Nama }}" >
        </div>
        <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" id="judul" name="judul" value="{{ $buku->judul }}" >
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah Buku</label>
            <input type="number" id="jumlah" name="jumlah" value="1" min="1">
        </div>
        <div class="form-group">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" required>
        </div>
        <div class="form-group">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" id="tanggal_kembali" name="tanggal_kembali"  readonly>
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" name="kelas" value="{{ $user->Kelas }}" >
        </div>
        <div class="form-group">
            <label for="no_hp">No. HP</label>
            <input type="text" id="no_hp" name="no_hp" required>
        </div>
        <div class="action-buttons">
            <button type="reset" class="cancel-btn">Batal</button>
            <button type="submit" class="pinjam-btn">Pinjam</button>
        </div>
    </form>
</div>


<!-- error -->
<div class="modal fade" id="statusErrorsModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"> 
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document"> 
        <div class="modal-content"> 
            <div class="modal-body text-center p-lg-4"> 
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                    <circle class="path circle" fill="none" stroke="#db3646" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" /> 
                    <line class="path line" fill="none" stroke="#db3646" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3" />
                    <line class="path line" fill="none" stroke="#db3646" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" X2="34.4" y2="92.2" /> 
                </svg> 
                <h4 class="text-danger mt-3">Invalid email!</h4> 
                <p class="mt-3">This email is already registered, please login.</p>
                <button type="button" class="btn btn-sm mt-3 btn-danger" data-bs-dismiss="modal">Ok</button> 
            </div> 
        </div> 
    </div> 
</div>

<!-- success -->
<div class="modal fade" id="statusSuccessModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"> 
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document"> 
        <div class="modal-content"> 
            <div class="modal-body text-center p-lg-4"> 
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                    <circle class="path circle" fill="none" stroke="#198754" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                    <polyline class="path check" fill="none" stroke="#198754" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " /> 
                </svg> 
                <h4 class="text-success mt-3">Peminjaman berhasil</h4> 
                <p class="mt-3">Silahkan ambil buku di perpustakaan.</p>
                <button type="button" class="btn btn-sm mt-3 btn-success" data-bs-dismiss="modal" id="closeModalBtn">Ok</button> 
            </div> 
        </div> 
    </div> 
</div>

<style>
    .form-container {
        padding: 20px 40px;
        margin: 40px;
        background-color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .section-title {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 40px;
        h4{
            background-color: #EFD4A0;
            color: #333;
            padding: 5px 40px;
            border-radius: 5px;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            box-shadow: 5px 7px 4px 0px #00000040;
        }
    }
    form{
        width: 70%;
        border: 1px solid #000;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 5px 4px 4px 0px #2E2751;
    }
    .form-header {
        text-align: center;
        background-color: #f5c37f;
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: bold;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    input, select, button {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    button {
        width: 15%;
        height: 40px;
        background-color: #3f366b;
        border-radius: 10px;
        color: white;
        border: none;
        cursor: pointer;
    }
    button:hover {
        background-color: #2c254f;
    }
    .action-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }
    .cancel-btn {
        background-color: #F8F1F1;
        color: black;
    }
    .cancel-btn:hover {
        background-color: gray;
        color: #fff;
    }

    /* modal pop up */
    .modal#statusSuccessModal .modal-content, 
    .modal#statusErrorsModal .modal-content {
        border-radius: 30px;
    }
    .modal#statusSuccessModal .modal-content svg, 
    .modal#statusErrorsModal .modal-content svg {
        width: 100px; 
        display: block; 
        margin: 0 auto;
    }
    .modal#statusSuccessModal .modal-content .path, 
    .modal#statusErrorsModal .modal-content .path {
        stroke-dasharray: 1000; 
        stroke-dashoffset: 0;
    }
    .modal#statusSuccessModal .modal-content .path.circle, 
    .modal#statusErrorsModal .modal-content .path.circle {
        -webkit-animation: dash 0.9s ease-in-out; 
        animation: dash 0.9s ease-in-out;
    }
    .modal#statusSuccessModal .modal-content .path.line, 
    .modal#statusErrorsModal .modal-content .path.line {
        stroke-dashoffset: 1000; 
        -webkit-animation: dash 0.95s 0.35s ease-in-out forwards; 
        animation: dash 0.95s 0.35s ease-in-out forwards;
    }
    .modal#statusSuccessModal .modal-content .path.check, 
    .modal#statusErrorsModal .modal-content .path.check {
        stroke-dashoffset: -100; 
        -webkit-animation: dash-check 0.95s 0.35s ease-in-out forwards; 
        animation: dash-check 0.95s 0.35s ease-in-out forwards;
    }

    @-webkit-keyframes dash { 
        0% {
            stroke-dashoffset: 1000;
        }
        100% {
            stroke-dashoffset: 0;
        }
    }
    @keyframes dash { 
        0% {
            stroke-dashoffset: 1000;
        }
        100%{
            stroke-dashoffset: 0;
        }
    }
    @-webkit-keyframes dash { 
        0% {
            stroke-dashoffset: 1000;
        }
        100% {
            stroke-dashoffset: 0;
        }
    }
    @keyframes dash { 
        0% {
            stroke-dashoffset: 1000;}
        100% {
            stroke-dashoffset: 0;
        }
    }
    @-webkit-keyframes dash-check { 
        0% {
            stroke-dashoffset: -100;
        }
        100% {
            stroke-dashoffset: 900;
        }
    }
    @keyframes dash-check {
        0% {
            stroke-dashoffset: -100;
        }
        100% {
            stroke-dashoffset: 900;
        }
    }
    .box00{
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }
</style>

<!-- Tambahkan di dalam file Blade -->
<!-- @if(session('status') === 'success')
    <script>
        window.onload = () => {
            const successModal = new bootstrap.Modal(document.getElementById('statusSuccessModal'));
            successModal.show();
        };
    </script>
@elseif(session('status') === 'error')
    <script>
        window.onload = () => {
            const errorModal = new bootstrap.Modal(document.getElementById('statusErrorsModal'));
            errorModal.show();
        };
    </script>
@endif -->


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen modal dari DOM
        const successModal = document.getElementById('statusSuccessModal');
        const errorModal = document.getElementById('statusErrorsModal');

        // Inisialisasi modal Bootstrap
        const bootstrapSuccessModal = new bootstrap.Modal(successModal);
        const bootstrapErrorModal = new bootstrap.Modal(errorModal);

        // Cek apakah ada session success atau error
        const hasSuccess = '{{ session('success') }}';
        const hasError = '{{ session('error') }}';

        if (hasSuccess) {
            bootstrapSuccessModal.show(); // Tampilkan modal success
        } else if (hasError) {
            bootstrapErrorModal.show(); // Tampilkan modal error
        }

        // Fungsi untuk mengarahkan ke halaman berikutnya
        function redirectToNextPage() {
            window.location.href = '{{ route("riwayat") }}'; // Ganti dengan URL atau route yang sesuai
        }

        // Tutup modal secara otomatis menggunakan fitur Bootstrap
        document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(el => {
            el.addEventListener('click', function() {
                if (bootstrapSuccessModal._isShown) {
                    bootstrapSuccessModal.hide();
                    redirectToNextPage(); // Arahkan ke halaman setelah modal ditutup
                }
                if (bootstrapErrorModal._isShown) {
                    bootstrapErrorModal.hide();
                    redirectToNextPage(); // Arahkan ke halaman setelah modal ditutup
                }
            });
        });

        // Tutup modal jika klik di luar modal dan arahkan ke halaman
        window.addEventListener('click', function(event) {
            if (event.target === successModal && bootstrapSuccessModal._isShown) {
                bootstrapSuccessModal.hide();
                redirectToNextPage(); // Arahkan ke halaman setelah modal ditutup
            } else if (event.target === errorModal && bootstrapErrorModal._isShown) {
                bootstrapErrorModal.hide();
                redirectToNextPage(); // Arahkan ke halaman setelah modal ditutup
            }
        });
    });

    // Fungsi untuk menghitung dan mengatur tanggal kembali
    function calculateReturnDate() {
        const tanggalPinjam = document.getElementById('tanggal_pinjam').value;

        if (tanggalPinjam) {
            const pinjamDate = new Date(tanggalPinjam);
            pinjamDate.setDate(pinjamDate.getDate() + 7); // Tambah 7 hari (1 minggu)

            // Format tanggal kembali ke YYYY-MM-DD
            const yyyy = pinjamDate.getFullYear();
            const mm = String(pinjamDate.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
            const dd = String(pinjamDate.getDate()).padStart(2, '0');
            const formattedDate = `${yyyy}-${mm}-${dd}`;

            // Set nilai ke input tanggal kembali
            document.getElementById('tanggal_kembali').value = formattedDate;
        }
    }

    // Tambahkan event listener ke input tanggal pinjam
    document.getElementById('tanggal_pinjam').addEventListener('change', calculateReturnDate);

    function searchRecords() {
        const searchTerm = document.getElementById('search').value;

        if (!searchTerm) {
            alert('Masukkan kata kunci untuk mencari.');
            return;
        }

        // Simulasi data pencarian
        const records = [
            { nama: 'Ahmad', judul: 'Pemrograman Web', jumlah: 1 },
            { nama: 'Budi', judul: 'Database MySQL', jumlah: 2 },
            { nama: 'Citra', judul: 'HTML dan CSS', jumlah: 1 }
        ];

        const results = records.filter(record =>
            record.nama.toLowerCase().includes(searchTerm.toLowerCase()) ||
            record.judul.toLowerCase().includes(searchTerm.toLowerCase())
        );

        const resultsBody = document.getElementById('results-body');
        resultsBody.innerHTML = '';

        results.forEach(record => {
            const row = document.createElement('tr');
            row.innerHTML = 
                `<td>${record.nama}</td>
                <td>${record.judul}</td>
                <td>${record.jumlah}</td>
                <td><button onclick="fillForm('${record.nama}', '${record.judul}', ${record.jumlah})">Pilih</button></td>`;
            resultsBody.appendChild(row);
        });

        document.getElementById('search-results').style.display = 'block';
    }

    function fillForm(nama, judul, jumlah) {
        document.getElementById('nama').value = nama;
        document.getElementById('judul').value = judul;
        document.getElementById('jumlah').value = jumlah;
        document.getElementById('search-results').style.display = 'none';
    }
</script>

@endsection