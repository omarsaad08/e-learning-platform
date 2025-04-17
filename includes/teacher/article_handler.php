<?php
session_start();
require '../dbh.inc.php';

// Ensure teacher is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    header("Location: ../login.php");
    exit();
}

$title = $_POST['title'];
$content = $_POST['content'];
$teacher_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("INSERT INTO articles (title, content, teacher_id) VALUES (?, ?, ?)");
$stmt->execute([$title, $content, $teacher_id]);

header("Location: dashboard.php");
exit();
