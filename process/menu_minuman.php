<?php
    require_once __DIR__ . '/../inc/db.php';

    $sql = "SELECT * FROM minuman";
    $result = $conn->query($sql);
    $menus_minuman = [];
    if ($result && $result->num_rows > 0) {
            $menus_minuman = $result->fetch_all(MYSQLI_ASSOC);
    } else {
            "data not found";
    }
?>