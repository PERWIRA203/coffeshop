<?php
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