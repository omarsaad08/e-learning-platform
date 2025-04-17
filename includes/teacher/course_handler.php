<?php
session_start();
require '../dbh.inc.php';

// Check if user is a teacher
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    header("Location: ../login.php");
    exit();
}

// Get posted data
$title = $_POST['title'];
$description = $_POST['description'];
$category = $_POST['category'];
$level = $_POST['level'];
$teacher_id = $_SESSION['user_id'];
$rating = 0.0; // Default rating on creation

// Handle thumbnail upload
$thumbnail_path = null;
if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
    $upload_dir = '../../uploads/thumbnails/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $ext = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
    $new_filename = uniqid() . '.' . $ext;
    $thumbnail_path = $upload_dir . $new_filename;

    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnail_path);
}

// Save course to DB with new fields
$stmt = $pdo->prepare("INSERT INTO courses (title, description, teacher_id, thumbnail, category, level, rating) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$title, $description, $teacher_id, $thumbnail_path, $category, $level, $rating]);

header("Location: ../../views/teacher/teacher_home.php");
exit();
