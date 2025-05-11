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

        if (empty($title)) {
            return ['success' => false, 'error' => 'Title is required'];
        }

        if (empty($description)) {
            return ['success' => false, 'error' => 'Description is required'];
        }

        if (empty($category)) {
            return ['success' => false, 'error' => 'Category is required'];
        }

        if (empty($level)) {
            return ['success' => false, 'error' => 'Level is required'];
        }

        if ($thumbnailFile && $thumbnailFile['error'] === UPLOAD_ERR_OK) {
            $fileSize = $thumbnailFile['size'];
            $fileType = $thumbnailFile['type'];

            if ($fileSize > 2000000) {
                return ['success' => false, 'error' => 'Thumbnail is too big (max 2MB)'];
            }

            if ($fileType !== 'image/jpeg' && $fileType !== 'image/png') {
                return ['success' => false, 'error' => 'Thumbnail must be a JPEG or PNG'];
            }

            $uploadDir = '../../uploads/thumbnails/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $ext = pathinfo($thumbnailFile['name'], PATHINFO_EXTENSION);
            $newFilename = uniqid() . '.' . $ext;
            $thumbnailPath = $uploadDir . $newFilename;

            if (!move_uploaded_file($thumbnailFile['tmp_name'], $thumbnailPath)) {
                return ['success' => false, 'error' => 'Error uploading thumbnail'];
            }
        }

        $success = $this->courseModel->create($title, $description, $category, $level, $teacherId, $thumbnailPath);

        if (!$success) {
            return ['success' => false, 'error' => 'Error creating course'];
        }

        return ['success' => true];
    }

    public function getTeacherCourses($teacherId)
    {
        return $this->courseModel->getTeacherCourses($teacherId);
    }

    public function getRandomCourses($limit = 3)
    {
        return $this->courseModel->getRandomCourses($limit);
    }
    public function getAllCourses()
    {
        return $this->courseModel->getAllCourses();
    }
    public function getCourseById($id)
    {
        return $this->courseModel->getCourseById($id);
    }
    public function getAllCategories()
    {
        return $this->courseModel->getAllCategories();
    }
}
