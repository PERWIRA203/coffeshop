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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Upload gambar
    $gambar = basename($_FILES['gambar']['name']);
    $targetPath = "../image/" . $gambar;

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetPath)) {
        $sql = "INSERT INTO topmenu (nama, deskripsi, harga, gambar) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $nama, $deskripsi, $harga, $gambar);

        if ($stmt->execute()) {
            echo "<script>
                    alert('✅ Menu baru berhasil ditambahkan!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('❌ Gagal menyimpan ke database!');
                    window.location.href = 'index.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('❌ Gagal upload gambar!');
                window.location.href = 'index.php';
              </script>";
    }
} else {
    header("Location: index.php");
    exit;
}
?>
