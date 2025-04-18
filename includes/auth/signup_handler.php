<?php
require '../dbh.inc.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role     = $_POST['role']; // 'student' or 'teacher'

    // Insert user into the database
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $password, $role]);

    // Get the new user's ID
    $userId = $pdo->lastInsertId();

    // Save user info in session
    $_SESSION['user_id'] = $userId;
    $_SESSION['role'] = $role;

    // Redirect based on role
    if ($role === 'student') {
        header("Location: ../../views/student/home.php");
    } elseif ($role === 'teacher') {
        header("Location: ../../views/teacher/teacher_home.php");
    } else {
        header("Location: ../login.html");
    }
    exit();
}
