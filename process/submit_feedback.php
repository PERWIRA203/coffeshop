<?php
session_start();
require_once __DIR__ . '/../inc/db.php';

// Pastikan user sudah login
if (!isset($_SESSION['user'])) {
    echo "Silakan login dulu.";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $feedback = trim($_POST['feedback']);
    $user_id = $_SESSION['user']['id'];

    if (!empty($feedback)) {
        // Simpan ke tabel review
        $stmt = $conn->prepare("INSERT INTO reviews (user_id, comment, created_at) VALUES (?, ?, NOW())");
        $stmt->bind_param("is", $user_id, $feedback);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Feedback berhasil dikirim!');
                    window.location.href='../review.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menyimpan feedback!');
                    window.location.href='../review.php';
                  </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
                alert('Feedback tidak boleh kosong!');
                window.location.href='../review.php';
              </script>";
    }
}

$conn->close();
?>