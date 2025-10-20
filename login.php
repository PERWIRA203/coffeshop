<?php
session_start();

// Kalau sudah login, langsung ke halaman utama
if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
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
            <a href="signup.php">Sign Up</a>
        </div>
    </header>
    <main class="main">
        <div class="background">
            <div class="container">
                <div class="bg"></div>
                <div class="form">
                    <form action="process/login_process.php" class="form-inside" method="post">
                        <h2>Login</h2>
                        <div class="login-other">
                            <div class="icon-login"><i class="fa-brands fa-google"></i></div>
                            <div class="icon-login"><i class="fab fa-twitter"></i></div>
                            <div class="icon-login"><i class="fab fa-facebook-f"></i></div>
                        </div>
                        <p class="or">or</p>
                        <input type="text" placeholder="Email" name="email">
                        <input type="password" placeholder="Password" name="password">
                        <button type="submit" name="login" class="button">Login</button>
                        <p class="account">Don't have an account? <a href="signup.php">Sign Up</a></p>
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