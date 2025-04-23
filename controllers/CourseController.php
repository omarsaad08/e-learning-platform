<?php

require_once '../../models/Course.php';

class CourseController
{
    private $courseModel;

    public function __construct()
    {
        $this->courseModel = new Course();
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Start session in constructor
        }
    }

    public function createCourse($title, $description, $category, $level, $thumbnailFile)
    {
        // Make sure only teachers can create courses
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
            return ['success' => false, 'error' => 'Unauthorized'];
        }

        $teacherId = $_SESSION['user_id'];
        $thumbnailPath = null;

        if ($thumbnailFile && $thumbnailFile['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../../uploads/thumbnails/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $ext = pathinfo($thumbnailFile['name'], PATHINFO_EXTENSION);
            $newFilename = uniqid() . '.' . $ext;
            $thumbnailPath = $uploadDir . $newFilename;

            move_uploaded_file($thumbnailFile['tmp_name'], $thumbnailPath);
        }

        $success = $this->courseModel->create($title, $description, $category, $level, $teacherId, $thumbnailPath);

        return ['success' => $success];
    }

    public function getTeacherCourses($teacherId)
    {
        return $this->courseModel->getTeacherCourses($teacherId);
    }

    public function getRandomCourses($limit = 3)
    {
        return $this->courseModel->getRandomCourses($limit);
    }
}
