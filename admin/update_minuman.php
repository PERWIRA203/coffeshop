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

$id = $_POST['id'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$gambar = null;

// Jika user upload gambar baru
if (!empty($_FILES['gambar']['name'])) {
    $gambar = basename($_FILES['gambar']['name']);
    $targetPath = "../image/" . $gambar;
    move_uploaded_file($_FILES['gambar']['tmp_name'], $targetPath);
    
    $sql = "UPDATE minuman SET nama=?, deskripsi=?, harga=?, gambar=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisi", $nama, $deskripsi, $harga, $gambar, $id);
} else {
    // tanpa ganti gambar
    $sql = "UPDATE minuman SET nama=?, deskripsi=?, harga=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $nama, $deskripsi, $harga, $id);
}

if ($stmt->execute()) {
     echo "<script>
                alert('✅ Menu berhasil diperbarui!');
                window.location.href = 'menu.php';
              </script>";
    exit;
} else {
    echo "Gagal memperbarui data: " . $conn->error;
}
?>