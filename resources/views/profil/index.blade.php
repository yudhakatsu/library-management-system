@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mx-auto" style="width: 60%; padding: 20px; border: 1px solid #ccc;">
        <div class="text-center">
            <img src="https://via.placeholder.com/100" class="rounded-circle" alt="User Avatar">
            <h5 class="mt-3">{{ $user['Nama'] }}</h5> <!-- Ambil nama dari sesi -->
        </div>
        <form method="POST" action="#" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" value="{{ $user['Password'] }}" placeholder="Masukkan Password">
                    <button class="btn btn-outline-secondary input-group-text" type="button" id="togglePassword">
                        <i id="togglePasswordIcon" class="bi bi-eye"></i>
                    </button>
                </div>
            </div>
            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control" id="nis" name="nis" value="{{ $user['NIS'] }}" placeholder="Masukkan NIS" readonly>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $user['Jenis_Kelamin'] }}" placeholder="Masukkan Jenis Kelamin" readonly>
            </div>
            <div class="mb-3">
                <label for="program_keahlian" class="form-label">Program Keahlian</label>
                <input type="text" class="form-control" id="program_keahlian" name="program_keahlian" value="{{ $user['Program_Keahlian'] }}" placeholder="Masukkan Program Keahlian" readonly>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $user['Kelas'] }}" placeholder="Masukkan Kelas" readonly>
            </div>
            <!-- <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div> -->
        </form>
    </div>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const icon = document.getElementById('togglePasswordIcon');
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        
        passwordInput.type = type;
        icon.classList.toggle('bi-eye');
        icon.classList.toggle('bi-eye-slash');
    });
</script>
@endsection
