<?php
$host = "localhost";   
$user = "root";        
$pass = "";            
$db   = "coffeshop";   

// buat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// cek koneksi
if ($conn->connect_error) {
    die("failed connection: " . $conn->connect_error);
} else {
    "success";
}
?>