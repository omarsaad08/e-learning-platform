<?php

require_once '../../models/Lesson.php';
require_once '../../includes/dbh.inc.php';

class LessonController
{
    private $lessonModel;

    public function __construct()
    {
        $this->lessonModel = new Lesson($GLOBALS['pdo']);
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function fetchCourseLessons($courseId)
    {
        return $this->lessonModel->getByCourseId($courseId);
    }

    public function uploadLesson($courseId, $title, $content, $position, $videoFile)
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
            return ['success' => false, 'error' => 'Unauthorized'];
        }

        if ($videoFile['error'] !== 0) {
            return ['success' => false, 'error' => 'Error uploading file'];
        }

        $allowedTypes = ['video/mp4', 'video/webm', 'video/ogg'];
        if (!in_array($videoFile['type'], $allowedTypes)) {
            return ['success' => false, 'error' => 'Unsupported video format'];
        }

        $uploadDir = '../../uploads/lessons/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $uniqueName = uniqid() . '-' . basename($videoFile['name']);
        $targetPath = $uploadDir . $uniqueName;
        $relativePath = 'uploads/lessons/' . $uniqueName;

        if (!move_uploaded_file($videoFile['tmp_name'], $targetPath)) {
            return ['success' => false, 'error' => 'Failed to move uploaded video'];
        }

        $success = $this->lessonModel->create($courseId, $title, $relativePath, $content, $position);

        return ['success' => $success];
    }
}
