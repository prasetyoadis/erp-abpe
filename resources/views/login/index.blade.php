<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        /* Mengatur reset dasar dan font */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Mengatur background dan memposisikan kotak di tengah layar */
        body {
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Desain kotak login */
        .login-card {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
        }

        .login-card h2 {
            text-align: center;
            color: #333333;
            margin-bottom: 30px;
        }

        /* Jarak antar input */
        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #666666;
            font-size: 14px;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        /* Efek saat input diklik */
        .input-group input:focus {
            border-color: #007BFF;
            outline: none;
        }

        /* Desain tombol login */
        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        /* Efek saat tombol di-hover */
        .btn-login:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <h2>Login</h2>
        <form onsubmit="event.preventDefault(); alert('Ini adalah simulasi klik login!');">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn-login">Masuk</button>
        </form>
    </div>

</body>

</html>
