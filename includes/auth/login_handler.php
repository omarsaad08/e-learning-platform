<?php
require '../dbh.inc.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on user role
        if ($user['role'] === 'teacher') {
            header("Location: ../../views/teacher/teacher_home.php");
            exit();
        } elseif ($user['role'] === 'student') {
            header("Location: ../../views/student/home.php");
            exit();
        } else {
            echo "Unknown role.";
        }
    } else {
        echo "Invalid email or password.";
    }
}
