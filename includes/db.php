<?php
$conn = mysqli_connect(
    $_ENV['DB_HOST'] ?? 'localhost',
    $_ENV['DB_USER'] ?? 'root',
    $_ENV['DB_PASS'] ?? '',
    $_ENV['DB_NAME'] ?? 'digital_library'
);

if (!$conn) {
    die("DB Connection Failed");
}
