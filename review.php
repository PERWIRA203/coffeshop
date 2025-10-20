<?php
session_start();
require_once __DIR__ . '/process/review_display.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/review.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="image/logo.jpg" alt="Logo" width="100" height="100">
        </div>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="facility.html">Facility</a>
            <a href="menu.php">Menu</a>
            <a href="review.php" class="active">Review</a>
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
            <div class="opening">
                <p>Review</p>
            </div>
        </div>
        <div class="container">
            <div class="section-best-menu">
                <h1>Customer Feedback</h1>
            </div>
            <div class="menu-container">
                <?php while ($review = $result->fetch_assoc()): ?>
                    <div class="card">
                        <img src="image/<?= htmlspecialchars(!empty($review['picture']) ? $review['picture'] : '/profile.png'); ?>"
                            alt="Foto User">
                        <div class="card-content">
                            <h3><?= htmlspecialchars($review['fullname']); ?></h3>
                            <h6>‘’</h6>
                            <p><?= htmlspecialchars($review['comment']); ?></p>
                            <h6>‘’</h6>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="feedback-list">
                <button id="addFeedbackBtn">Add Feedback</button>
            </div>
            <div class="popup" id="popup">
                <div class="popup-content">
                    <h3>Submit Feedback</h3>
                    <form id="feedbackForm" action="process/submit_feedback.php" method="POST">
                        <textarea id="feedback" rows="4" maxlength="150"
                            placeholder="Your Feedback (max 150 chars)" name="feedback"></textarea>
                        <div class="char-count" id="charCount">0 / 150</div>
                        <div class="button-row">
                            <button type="button" class="close-btn" id="closePopup">Close</button>
                            <button class="submit-btn" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="banner">
            <img src="./image/grind.png" alt="coffe grind">
            <h2>Kopi yang tidak hanya dinikmati, tapi juga memberi ruang untuk bercerita, bekerja, atau sekadar melepas
                penat.</h2>
            <img src="./image/ground.png" alt="ground picture">
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
<script>
    const addBtn = document.getElementById('addFeedbackBtn');
    const popup = document.getElementById('popup');
    const closeBtn = document.getElementById('closePopup');
    const feedbackForm = document.getElementById('feedbackForm');
    const feedbackInput = document.getElementById('feedback');
    const charCount = document.getElementById('charCount');

    // buka popup
    addBtn.addEventListener('click', () => {
        popup.style.display = 'flex';
    });

    // tutup popup
    closeBtn.addEventListener('click', () => {
        popup.style.display = 'none';
        feedbackInput.value = '';
        charCount.textContent = '0 / 150';
    });

    // update counter karakter
    feedbackInput.addEventListener('input', () => {
        const length = feedbackInput.value.length;
        charCount.textContent = `${length} / 150`;
    });
</script>

</html>