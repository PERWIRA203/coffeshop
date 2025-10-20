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
    require_once __DIR__ . '/menu_makanan.php';
    require_once __DIR__ . '/menu_minuman.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/ad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../image/logo.jpg" alt="Logo" width="100" height="100">
        </div>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="#" class="active">Menu</a>
            <a href="review.php">Review</a>
            <a href="user.php">User</a>
        </nav>
        <div class="logout">
            <a href="logout.php">Log Out</a>
        </div>
    </header>
    <main class="main">
        <div class="section-header">
            <h2>Menu Makanan Management</h2>
        </div>
        <table class="table" border="1" cellspacing="0" cellpadding="8">
            <tr>
                <td><h3>Nama</h3></td>
                <td><h3>Deskripsi</h3></td>
                <td><h3>Harga</h3></td>
                <td><h3>Gambar</h3></td>
                <td><h3>Edit</h3></td>
                <td><h3>Hapus</h3></td>
            </tr>

            <?php if (!empty($menus_makanan)): ?>
                <?php foreach ($menus_makanan as $menu): ?>
                    <tr>
                        <td><?= htmlspecialchars($menu['nama']); ?></td>
                        <td><?= htmlspecialchars($menu['deskripsi']); ?></td>
                        <td>Rp. <?= number_format($menu['harga'], 0, ',', '.'); ?></td>
                        <td>
                            <?php if (!empty($menu['gambar'])): ?>
                                <img src="../image/<?= htmlspecialchars($menu['gambar']); ?>" alt="Gambar" width="80">
                            <?php else: ?>
                                <em>Tidak ada gambar</em>
                            <?php endif; ?>
                        </td>
                        <td><a href="edit_makanan.php?id=<?= $menu['id']; ?>">Edit</a></td>
                        <td><a href="delete_makanan.php?id=<?= $menu['id']; ?>">Hapus</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align:center;">Tidak ada data ditemukan</td>
                </tr>
            <?php endif; ?>
        </table>
        <div class="add-menu">
            <a href="add_makanan.php" class="btn-add">+ Tambah Menu</a>
        </div>
        <div class="section-header">
            <h2>Menu Minuman Management</h2>
        </div>
        <table class="table" border="1" cellspacing="0" cellpadding="8">
            <tr>
                <td><h3>Nama</h3></td>
                <td><h3>Deskripsi</h3></td>
                <td><h3>Harga</h3></td>
                <td><h3>Gambar</h3></td>
                <td><h3>Edit</h3></td>
                <td><h3>Hapus</h3></td>
            </tr>

            <?php if (!empty($menus_minuman)): ?>
                <?php foreach ($menus_minuman as $menu): ?>
                    <tr>
                        <td><?= htmlspecialchars($menu['nama']); ?></td>
                        <td><?= htmlspecialchars($menu['deskripsi']); ?></td>
                        <td>Rp. <?= number_format($menu['harga'], 0, ',', '.'); ?></td>
                        <td>
                            <?php if (!empty($menu['gambar'])): ?>
                                <img src="../image/<?= htmlspecialchars($menu['gambar']); ?>" alt="Gambar" width="80">
                            <?php else: ?>
                                <em>Tidak ada gambar</em>
                            <?php endif; ?>
                        </td>
                        <td><a href="edit_minuman.php?id=<?= $menu['id']; ?>">Edit</a></td>
                        <td><a href="delete_minuman.php?id=<?= $menu['id']; ?>">Hapus</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align:center;">Tidak ada data ditemukan</td>
                </tr>
            <?php endif; ?>
        </table>
        <div class="add-menu">
            <a href="add_minuman.php" class="btn-add">+ Tambah Menu</a>
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