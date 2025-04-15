<?php
session_start();
require '../../backend/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    http_response_code(403);
    echo json_encode(["error" => "Unauthorized"]);
    exit();
}

$teacher_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM articles WHERE teacher_id = ?");
$stmt->execute([$teacher_id]);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($articles);
