<?php
// include('connect.php');
session_start();
include('function.php');

if(isset($_SESSION['login'])) {
    header('location: ../style/user.php');
    exit;
}

if(isset($_POST['register'])) {
    register($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <style>
        /* Reset styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
            color: #555;
        }

        p a {
            color: #007bff;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

        form ul {
            list-style: none;
        }

        form li {
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.25);
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftarkan Akun Anda</h1>
        <p>Sudah memiliki akun? <a href="login.php">Login di sini</a></p>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </li>
                <li>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="pw" required autocomplete="off">
                </li>
                <li>
                    <label for="confirm-password">Konfirmasi  Password</label>
                    <input type="password" name="confirm_password" id="pw2" required autocomplete="off">
                </li>
                <li>
                    <button type="submit" name="register">Buat Akun</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>
