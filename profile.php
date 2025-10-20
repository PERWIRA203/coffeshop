<?php
session_start();

// Kalau sudah login, langsung ke halaman utama
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/profile.css">
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
            <a href="about.php" >About Us</a>
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
                <span class="username"><a href="profile.php"><?php echo htmlspecialchars($firstName); ?></a></span>
            </div>
        <?php else: ?>
            <a href="signup.php">Sign Up</a>
        <?php endif; ?>
        </div>
    </header>
    <main class="main">
        <div class="background">
            <div class="container">
                <div class="data-user">
                    <div class="profile-picture">
                        <img src="image/profile.png" alt="">
                        <div><h4>Admin</h4></div>
                    </div>
                    <div class="data-account">
                        <h3>account information</h3>
                        <div class="information-data">
                            <div>
                                <?php ?>
                                <?php ?>
                            </div>
                            <div>
                                <?php ?>
                                <?php ?>
                            </div>
                        </div>
                    </div>
                    <div class="data">

                    </div>
                </div>
                <div class="button-add">

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