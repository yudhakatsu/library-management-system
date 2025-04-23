<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;
            background-image: url('{{ asset('images/admin-bg.png') }}'); /* Ganti dengan path gambar Anda */
            background-size: cover; /* Menutupi seluruh body */
            background-position: center; /* Posisikan gambar di tengah */
            background-repeat: no-repeat; /* Jangan ulang gambar */
            position: relative; /* Membutuhkan ini untuk pseudo-elemen */
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Warna gelap dengan transparansi */
            z-index: -1; /* Agar overlay berada di belakang konten */
        }

        .container {
            display: flex;
            width: 80%;
            height: 500px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .left {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            padding: 30px;
            text-align: center;
        }

        .left img {
            width: 200px;
            margin-bottom: 20px;
        }

        .left h2 {
            font-size: 24px;
            color: #333;
            margin-top: 10px;
        }

        .right {
            flex: 1;
            background-color: #ffcc33;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .right h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 22px;
        }

        form{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            width: 350px;
            margin-bottom: 15px;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            padding-right: 35px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .form-group .input-icon {
            position: absolute;
            right: 10px;
            top: 35%;
            transform: translateY(-50%);
            width: 20px;  /* Sesuaikan ukuran ikon */
            height: 20px; /* Sesuaikan ukuran ikon */
        }

        .form-group i {
            margin-right: 10px;
        }

        .login-btn {
            padding: 10px 20px;
            background-color: #4b3d28;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            width: 300px;
        }

        .login-btn:hover {
            background-color: #3b2d1a;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <img src="{{ asset('images/logo-perpustakaan.png') }}" alt="Logo">
            <h2>Admin Perpustakaan<br>SMK Baitussalam Pekalongan</h2>
        </div>
        <div class="right">
            <h2>LOGIN ADMIN</h2>
            <form action="{{ route('login.submit') }}" method="POST">
            @csrf 
                <div class="form-group username">
                    <input type="text" name="username" placeholder="Username" required>
                    <img src="{{ asset('images/username.png') }}" alt="" class="input-icon">
                </div>
                <div class="form-group password">
                    <input type="password" name="password" placeholder="Password" required>
                    <img src="{{ asset('images/password.png') }}" alt="" class="input-icon">
                </div>
                <button type="submit" class="login-btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
