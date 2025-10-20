<?php
require_once __DIR__ . '/../inc/db.php';

$query = "
    SELECT r.comment, r.created_at, u.fullname, u.picture
    FROM reviews r
    JOIN users u ON r.user_id = u.id
    ORDER BY r.created_at DESC
";
$result = $conn->query($query);

if (!$result) {
    die("Query error: " . $conn->error);
}
?>