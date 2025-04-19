<?php
session_start();
require_once '../../includes/dbh.inc.php';

// Check login
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$course_id = $_POST['course_id'] ?? null;

if (!$course_id) {
    die("Course ID not provided.");
}

// Check if already enrolled
$stmt = $pdo->prepare("SELECT * FROM enrollments WHERE student_id = ? AND course_id = ?");
$stmt->execute([$user_id, $course_id]);

if ($stmt->rowCount() > 0) {
    header("Location: ../../views/student/courses.php?message=already_enrolled");
    exit;
}

// Enroll user
$stmt = $pdo->prepare("INSERT INTO enrollments (student_id, course_id) VALUES (?, ?)");
if ($stmt->execute([$user_id, $course_id])) {
    header("Location: ../../views/student/courses.php?message=enrolled_successfully");
} else {
    echo "Failed to enroll.";
}
