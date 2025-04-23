<?php

require_once '../../controllers/LessonController.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_FILES['lesson_video']) &&
        isset($_POST['lesson_title']) &&
        isset($_POST['lesson_content']) &&
        isset($_POST['course_id'])
    ) {
        $controller = new LessonController();

        $courseId = $_POST['course_id'];
        $title = $_POST['lesson_title'];
        $content = $_POST['lesson_content'];
        $position = $_POST['lesson_position'] ?? null;
        $videoFile = $_FILES['lesson_video'];

        $result = $controller->uploadLesson($courseId, $title, $content, $position, $videoFile);

        if ($result['success']) {
            header("Location: ../../views/teacher/teacher_home.php");
            exit();
        } else {
            echo "Error: " . $result['error'];
        }
    } else {
        echo "Missing fields.";
    }
}

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    var_dump($_SESSION);
    header("Location: ../auth/login.php");
    exit();
}

$teacher_id = $_SESSION['user_id'];

// Check if course_id is passed
if (!isset($_GET['course_id']) || !is_numeric($_GET['course_id'])) {
    header("Location: dashboard.php");
    exit();
}

$course_id = $_GET['course_id'];

// Fetch course details (optional, for confirmation on the page)
$stmt = $pdo->prepare("SELECT * FROM courses WHERE id = ? AND teacher_id = ?");
$stmt->execute([$course_id, $teacher_id]);
$course = $stmt->fetch();

if (!$course) {
    header("Location: dashboard.php");
    exit();
}

// Handle form submission to add lesson
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the backend logic for lesson upload
    require '../../includes/teacher/lesson_upload_handler.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Lesson</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2>Create New Lesson for Course: <?= htmlspecialchars($course['title']) ?></h2>

        <!-- Lesson Upload Form -->
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="lesson_title" class="form-label">Lesson Title</label>
                <input type="text" class="form-control" id="lesson_title" name="lesson_title" required>
            </div>

            <div class="mb-3">
                <label for="lesson_video" class="form-label">Upload Lesson Video</label>
                <input type="file" class="form-control" id="lesson_video" name="lesson_video" accept="video/*" required>
            </div>

            <div class="mb-3">
                <label for="lesson_content" class="form-label">Lesson Content</label>
                <textarea class="form-control" id="lesson_content" name="lesson_content" rows="4" placeholder="Enter lesson description or notes..."></textarea>
            </div>

            <div class="mb-3">
                <label for="lesson_position" class="form-label">Lesson Position (Optional)</label>
                <input type="number" class="form-control" id="lesson_position" name="lesson_position" placeholder="Position in course">
            </div>

            <button type="submit" class="btn btn-primary">Save Lesson</button>
        </form>


        <a href="teacher_home.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>
</body>

</html>