<?php
session_start();
require_once '../../includes/dbh.inc.php';

// Check if the teacher is logged in
if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $teacherId = $_SESSION['user_id'];

    if (empty($title) || empty($content)) {
        die("Title and content are required.");
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO articles (title, content, teacher_id, created_at) VALUES (:title, :content, :teacher_id, NOW())");
        $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':teacher_id' => $teacherId
        ]);

        header("Location: ../../views/teacher/teacher_home.php");
        exit;
    } catch (PDOException $e) {
        echo "Error saving article: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
