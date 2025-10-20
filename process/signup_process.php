<?php
require_once __DIR__ . '/../inc/db.php';
session_start();

if (isset($_POST['signup'])) {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = "client";

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah email sudah terdaftar
    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email sudah digunakan!'); window.location.href='../signup.php';</script>";
        exit();
    }

    // Simpan data user
    $stmt = $conn->prepare("INSERT INTO users (role, fullname, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss",$role, $fullname, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Ambil first name dari full name
        $firstName = explode(" ", $fullname)[0];
        echo "Signup process file loaded!";

        // Auto login
        $_SESSION['user'] = [
            'id' => $stmt->insert_id,
            'fullname' => $fullname,
            'email' => $email,
            'role' => $role,
            'picture' => '../image/profile.png'
        ];

        echo "<script>
                alert('Registrasi berhasil! Selamat datang, $firstName');
                window.location.href='../index.php';
              </script>";
    } else {
        echo "<script>
                alert('Terjadi kesalahan saat registrasi!');
                window.location.href='../signup.php';
              </script>";
    }
}
?>
