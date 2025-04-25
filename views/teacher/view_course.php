<?php
session_start();
require_once '../../controllers/LessonController.php';
require_once '../../controllers/CourseController.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2>Course Lessons</h2>
        <a href="teacher_home.php" class="btn btn-secondary mb-3">← Back to Dashboard</a>

        <?php if (count($lessons) === 0): ?>
            <p>No lessons added yet for this course.</p>
        <?php else: ?>
            <div class="list-group">
                <?php foreach ($lessons as $lesson): ?>
                    <div class="list-group-item">
                        <h5><?= htmlspecialchars($lesson['title']) ?></h5>
                        <video width="100%" controls>
                            <source src="../../<?= htmlspecialchars($lesson['video_url']) ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <p class="mt-2"><?= nl2br(htmlspecialchars($lesson['content'])) ?></p>
                        <small class="text-muted">Position: <?= $lesson['position'] ?></small>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>