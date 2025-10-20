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

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}
require_once __DIR__ . '/../inc/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM topmenu WHERE id = ?";
    $deleteStmt = $conn->prepare($sql);
    $deleteStmt->bind_param("i", $id);

    if ($deleteStmt->execute()) {
        echo "<script>
                alert('✅ Menu berhasil dihapus!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Gagal menghapus menu: " . addslashes($conn->error) . "');
                window.location.href = 'index.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID menu tidak ditemukan!');
            window.location.href = 'index.php';
          </script>";
}
?>
