<?php
require_once '../../models/User.php';
require_once '../../models/Course.php';
require_once '../../models/Enrollment.php';

class ProfileController
{
    private $userModel;
    private $courseModel;
    private $enrollmentModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->courseModel = new Course();
        $this->enrollmentModel = new Enrollment();
    }

    public function getUserProfile($userId)
    {
        $user = $this->userModel->getUserById($userId);
        $courses = [];

        if ($user['role'] === 'student') {
            $courses = $this->enrollmentModel->getCoursesByStudent($userId);
        } elseif ($user['role'] === 'teacher') {
            $courses = $this->courseModel->getTeacherCourses($userId);
        }

        return [
            'user' => $user,
            'courses' => $courses
        ];
    }
}
