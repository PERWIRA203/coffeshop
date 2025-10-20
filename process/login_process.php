<?php
$secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
session_set_cookie_params([
    'lifetime' => 0,                
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => $secure,            
    'httponly' => true,             
    'samesite' => 'Lax'             
]);

session_start();

require_once __DIR__ . '/../inc/db.php';


if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    
    $stmt = $conn->prepare("SELECT id, fullname, email, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Regenerasi session id untuk mencegah session fixation
            session_regenerate_id(true);

            // Simpan ke session hanya data yang perlu
            $_SESSION['user'] = [
                'id' => $user['id'],
                'fullname' => $user['fullname'],
                'email' => $user['email'],
                'role' => $user['role'],
                'picture' => $user['picture']
            ];

            $firstName = htmlspecialchars(strtok($user['fullname'], ' '), ENT_QUOTES, 'UTF-8');

            // Redirect ke folder admin bila role = 'admin'
            if (strtolower($_SESSION['user']['role']) === 'admin') {
                echo "<script>
                        alert('Welcome back, Admin $firstName!');
                        window.location.href = '/coffeshop/admin/index.php';
                      </script>";
                exit;
            } else {
                echo "<script>
                        alert('Welcome back, $firstName!');
                        window.location.href = '/coffeshop/index.php';
                      </script>";
                exit;
            }
        } else {
            echo "<script>
                    alert('Password salah!');
                    window.location.href = '/coffeshop/login.php';
                  </script>";
            exit;
        }
    } else {
        echo "<script>
                alert('Email tidak ditemukan!');
                window.location.href = '/login.php';
              </script>";
        exit;
    }
}