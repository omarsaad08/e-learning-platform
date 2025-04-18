<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_FILES['lesson_video']) &&
        isset($_POST['lesson_title']) &&
        isset($_POST['lesson_content'])
    ) {
        $lesson_title = $_POST['lesson_title'];
        $lesson_content = $_POST['lesson_content'];
        $lesson_position = isset($_POST['lesson_position']) ? $_POST['lesson_position'] : null;
        $lesson_video = $_FILES['lesson_video'];

        // Check for upload errors
        if ($lesson_video['error'] !== 0) {
            echo "Error uploading file.";
            exit();
        }

        // Validate file type
        $allowed_types = ['video/mp4', 'video/webm', 'video/ogg'];
        if (!in_array($lesson_video['type'], $allowed_types)) {
            echo "Unsupported video format. Allowed: MP4, WEBM, OGG.";
            exit();
        }

        // Create upload directory if not exists
        $upload_dir = '../../uploads/lessons/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Move uploaded file
        $unique_name = uniqid() . '-' . basename($lesson_video['name']);
        $target_path = $upload_dir . $unique_name;
        $relative_path = 'uploads/lessons/' . $unique_name; // Save this in DB

        if (!move_uploaded_file($lesson_video['tmp_name'], $target_path)) {
            echo "Failed to save uploaded video.";
            exit();
        }

        // Save lesson to database
        require '../../includes/dbh.inc.php';
        $stmt = $pdo->prepare("INSERT INTO lessons (course_id, title, video_url, content, position) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$course_id, $lesson_title, $relative_path, $lesson_content, $lesson_position]);

        header("Location: teacher_home.php");
        exit();
    } else {
        echo "Please fill in all required fields.";
    }
}
