<?php
    require_once __DIR__ . '/../inc/db.php';

    $sql = "SELECT * FROM topmenu";
    $result = $conn->query($sql);
    $menus = [];
    if ($result && $result->num_rows > 0) {
            $menus = $result->fetch_all(MYSQLI_ASSOC);
    } else {
            "data not found";
    }
?>