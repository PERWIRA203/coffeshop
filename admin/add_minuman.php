<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== 'admin') {
        echo "<script>
                alert('Anda harus login sebagai admin untuk mengakses halaman ini.');
                window.location.href = '/coffeshop/login.php';
            </script>";
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Menu</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <link rel="stylesheet" href="../css/top_menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../image/logo.jpg" alt="Logo" width="100" height="100">
        </div>
        <nav class="navbar">
            <a href="#" class="active">Home</a>
            <a href="menu.php">Menu</a>
            <a href="review.php">Review</a>
            <a href="user.php">User</a>
        </nav>
        <div class="logout">
            <a href="logout.php">Log Out</a>
        </div>
    </header>
    <main class="main">
        <div class="section-header">
            <h2>Tambah Data Top Menu</h2>
        </div>
        <div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="simpan_minuman.php">
                <div class="mb-3">
                    <label class="form-label"><h3>Nama</h3></label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h3>Deskripsi</h3></label>
                    <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h3>Harga</h3></label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h3>Gambar Saat Ini</h3></label><br>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="menu.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Tambahkan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
    </main>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
            <h3>Home</h3>
            <ul>
                <li><a href="#">Best Menu</a></li>
                <li><a href="#">Fasilitas</a></li>
            </ul>
            </div>

            <div class="footer-column">
            <h3>About Us</h3>
            <ul>
                <li><a href="#">History</a></li>
                <li><a href="#">Vision and Mission</a></li>
            </ul>
            </div>

            <div class="footer-column">
            <h3>Contact Us</h3>
            <p><a href="mailto:coffesantai@gmail.com">Coffesantai@gmail.com</a></p>
            <p><a href="tel:+6271911829181">+6271911829181</a></p>
            </div>

            <div class="footer-column">
            <h3>Social Media</h3>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-tiktok"></i></a>
            </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>Copyright © 2025 Kopi Santai. All right reserved</p>
        </div>
    </footer>
</body>
</html>