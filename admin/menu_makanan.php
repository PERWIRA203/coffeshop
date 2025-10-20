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
    require_once __DIR__ . '/../inc/db.php';

    $sql = "SELECT * FROM makanan";
    $result = $conn->query($sql);
    $menus_makanan = [];
    if ($result && $result->num_rows > 0) {
            $menus_makanan = $result->fetch_all(MYSQLI_ASSOC);
    } else {
            "data not found";
    }
?>