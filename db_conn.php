<?php

$host = "localhost";
$user = "root";
$password = "";
$db_name = "login_db";

// Enable mysqli error reporting (useful for debugging, turn off in production)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $user, $password, $db_name);
    $conn->set_charset("utf8mb4"); // Recommended charset
} catch (mysqli_sql_exception $e) {
    die("Connection failed: " . $e->getMessage());
}
