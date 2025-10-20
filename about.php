<?php
    session_start();
    require_once __DIR__ . '/process/home.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="image/logo.jpg" alt="Logo" width="100" height="100">
        </div>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="#" class="active">About Us</a>
            <a href="facility.html">Facility</a>
            <a href="menu.php">Menu</a>
            <a href="review.php">Review</a>
            <a href="contact.php">Contact</a>
        </nav>
        <div class="signup">
            <?php if (!empty($_SESSION['user'])): ?>
            <?php 
                // Ambil nama depan
                $firstName = strtok($_SESSION['user']['fullname'], ' ');
            ?>
            <div class="profile">
                <img src="image/profile.png" alt="">
                <span class="username"><a href=""><?php echo htmlspecialchars($firstName); ?></a></span>
            </div>
        <?php else: ?>
            <a href="signup.php">Sign Up</a>
        <?php endif; ?>
        </div>
    </header>
    <main class="main">
        <div class="background">
            <div class="opening">
                <p>Dari secangkir kopi, kami ingin menciptakan jutaan kenangan.</p>
            </div>
            <div class="button-reservation">
                <a href="reservation.php">Reservation Now</a>
            </div>
        </div>
        <div class="container">
            <div class="section-best-menu">
                <h1>Menu Terbaik Kami</h1>
            </div>
            <div class="menu-container">
                <?php foreach ($menus as $menu): ?>
                    <div class="card">
                        <img src="<?php echo "image/{$menu['gambar']}"; ?>" alt="<?php echo $menu['nama']; ?>">
                        <div class="card-content">
                            <h3><?php echo $menu['nama']; ?></h3>
                            <p><?php echo $menu['deskripsi']; ?></p>
                            <div class="section-btn">
                                <span class="price">Rp. <?php echo number_format($menu['harga'], 0, ',', '.'); ?></span>
                                <a href="#" class="btn-menu">Menu</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="banner">
            <img src="./image/grind.png" alt="coffe grind">
            <h2>Kopi yang tidak hanya dinikmati, tapi juga memberi ruang untuk bercerita, bekerja, atau sekadar melepas penat.</h2>
            <img src="./image/ground.png" alt="ground picture">
        </div>
        <div class="facility">
            <div class="section-best-menu">
                <h1>Fasilitas Kami</h1>
            </div>
            <div class="gallery">
                <div class="picture1">
                    <h4>Area Depan</h4>
                </div>
                <div class="group"> 
                    <div class="group-1">
                        <div class="picture2">
                            <h4>Wifi Gratis</h4>
                        </div>
                        <div class="picture3">
                            <h4>Area Meeting 10 Orang</h4>
                        </div>                    
                    </div>
                    <div class="group-2">
                        <div class="picture4">
                            <h4>Area Merokok</h4>
                        </div>
                        <div class="picture5">
                            <h4>Area Nobar</h4>
                        </div>
                    </div>                                
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