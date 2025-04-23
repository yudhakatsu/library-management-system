<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('/images/baground login siswa.png');
            background-size: cover;
            background-position: center;
            color: #333;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container h1 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .login-container p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 2rem;
        }
        .login-container input {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-container .login-btn {
            background-color: #4a3f7e;
            color: white;
            padding: 0.75rem;
            width: 100%;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .login-container .login-btn:hover {
            background-color: #3a3062;
        }
        .input-group {
            display: flex;
            align-items: center;
            position: relative;
        }
        .input-group i {
            position: absolute;
            right: 10px;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>LOGIN</h1>
        <p>Lakukan login terlebih dahulu untuk meminjam buku</p>
        <form action="{{ route('user.submit') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" name="nis" placeholder="Username" required>
                <i class="fa fa-user"></i>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fa fa-lock"></i>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>
