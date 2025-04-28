<?php
session_start();
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uname = trim($_POST['uname']);
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $re_password = trim($_POST['re_password']);

    if (empty($uname) || empty($name) || empty($password) || empty($re_password)) {
        header("Location: register.php?error=Please fill all fields");
        exit();
    } elseif ($password !== $re_password) {
        header("Location: register.php?error=Passwords do not match");
        exit();
    } else {
        // Check if username already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = ?");
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            header("Location: register.php?error=Username already taken");
            exit();
        } else {
            // Insert new user
            $stmt = $conn->prepare("INSERT INTO users (user_name, name, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $uname, $name, $password);
            $stmt->execute();

            header("Location: register.php?success=Account created successfully");
            exit();
        }
    }
} else {
    header("Location: register.php");
    exit();
}
?>
