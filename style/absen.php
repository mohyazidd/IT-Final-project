<?php
session_start();
include('../database/connect.php');

if(!isset($_SESSION['login'])) {
    header('location: ../index.php');
    exit;
}

if(isset($_GET['submit'])) {
    $userID = $_GET['user_id'];
    $judul = $_GET['judul'];
    $isi = $_GET['isi'];

    $query = mysqli_query($conn, 
        "INSERT INTO absent (user_id, judul, isi) 
        VALUES ('$userID', '$judul', '$isi')"
    );

    if($query) {
        header('location: user.php');
    };
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi kehadiran</title>
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
            font-size: 1.8rem;
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
        }

        /* Footer */
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
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
        <h1>Silahkan isi pada tabel yang tersedia</h1>
        <p>Harap isi semua tabel yang ada</p>
        <button class="btn btn-light-blue d-md-none" id="toggleSidebar">☰ Menu</button>
    </header>

    <!-- Sidebar -->
    <div id="sidebar">
        <ul class="list-unstyled">
            <li><a href="index.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
            <li><a href="absen.php" class="active"><i class="bi bi-file-earmark-text"></i> Absen</a></li>
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
        <section id="report">
            <div class="mb-4">
                <h3>Buat laporan baru</h3>
                <form action="absen.php" method="get">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="user_id" id="user_id" placeholder="Masukkan nama santri" required>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Kategori</label>
                        <select class="form-select" name="judul" id="judul" required>
                            <option selected disabled>Pilih kategori</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Izin">Izin</option>
                            <option value="Alpha">Alpha</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="isi" id="isi" rows="3" placeholder="Deskripsi/alasan santri" required></textarea>
                    </div>
                    <button name="submit" type="submit" class="btn btn-light-blue">Kirim</button>
                </form>
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
