<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA ABSENSI SANTRI PONDOK PESANTRIN-IDN</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        header {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 2rem;
            margin-bottom: 0;
        }

        header p {
            margin: 0;
            font-size: 1rem;
        }

        /* Sidebar */
        #sidebar {
            background-color: #ffffff;
            border-right: 1px solid #dee2e6;
            height: 100%;
            padding-top: 20px;
            min-width: 240px;
            position: fixed;
        }

        #sidebar a {
            color: #343a40;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 4px;
            margin: 5px 15px;
            font-size: 1rem;
            font-weight: bold;
        }

        #sidebar a:hover,
        #sidebar a.active {
            background-color: #007bff;
            color: white;
        }

        /* Main Content */
        main {
            margin-left: 260px;
            padding: 20px;
            flex-grow: 1;
        }

        .image-container {
            text-align: center;
            margin-top: 20px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            #sidebar {
                display: none;
            }

            #toggleSidebar {
                display: inline-block;
            }

            main {
                margin-left: 0;
            }

            .image-container img {
                width: 100%;
            }
        }

        /* Footer */
        footer {
            background-color: #00274d;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
        }

        footer p {
            margin: 0;
        }

        /* Custom Light Blue Button */
        .btn-light-blue {
            background-color: #00aaff;
            color: white;
            border: none;
        }

        .btn-light-blue:hover {
            background-color: #0099e6;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Laporan absensi santri</h1>
        <p>Dibuat oleh santri sendiri</p>
        <button class="btn btn-light-blue d-md-none" id="toggleSidebar">☰ Menu</button>
    </header>

    <!-- Sidebar -->
    <div id="sidebar">
        <ul class="list-unstyled">
            <li><a href="index.php" class="active"><i class="bi bi-house-door"></i> Dashboard</a></li>
            <li><a href="absen.php"><i class="bi bi-file-earmark-text"></i> Absen</a></li>
            <li><a href="user.php"><i class="bi bi-people"></i> Users</a></li>
            <?php if(isset($_SESSION['login']) && $_SESSION['login']) {?>
            <li><a href="../auth/logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
            <?php }else{ ?>
                <li><a href="../auth/login.php"><i class="bi bi-box-arrow-right"></i> Login</a></li>
                <li><a href="../auth/register.php"><i class="bi bi-person-plus"></i> Register</a></li>
            <?php } ?>        </ul>
    </div>

    <!-- Main Content -->
    <main>
        <section id="dashboard">
            <h1>Dashboard</h1>
            <h3>Selamat datang di dalam absensi kehadiran santri</h3>
            <p>
                Di dalam sini anda dapat mengabsen dan menilai kelakuan santri sehari hari dan juga anda dapat memantau semua perbuatan santri yang nanti akan dimasukkan kedalam raport santri tersebut.
            </p>
            <div class="image-container">
                <img src="idn gedung.png" alt="idn" class="img-fluid">
            </div>
        </section>
    </main>
    <!-- JavaScript -->
    <script>
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        toggleSidebar.addEventListener('click', () => {
            sidebar.style.display = sidebar.style.display === 'block' ? 'none' : 'block';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
