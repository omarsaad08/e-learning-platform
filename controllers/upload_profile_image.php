<?php
session_start();
require_once 'AuthController.php';
if (!isset($_SESSION['user_id']) || !isset($_FILES['profile_image'])) {
    header("Location: ../views/mutual/profile.php");
    exit();
}

$userId = $_SESSION['user_id'];
$imageFile = $_FILES['profile_image'];

$auth = new AuthController();
$result = $auth->uploadProfileImage($userId, $imageFile);

// You can show a message or redirect back
header("Location: ../views/mutual/profile.php");
exit();
