<?php
require_once __DIR__ . '/../models/Enrollment.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Course.php';

class EnrollmentsController
{

    // Enroll a student in a course
    public function enroll($courseId, $studentId)
    {
        // Check if the student is already enrolled
        if ($this->isEnrolled($courseId, $studentId)) {
            header("Location: http://localhost/e-learning-platform/views/student/courses.php?message=You are already enrolled in this course.");

            exit();
        }

        // Proceed with enrollment
        $enrollment = new Enrollment();
        $enrollment->enrollStudent($courseId, $studentId);

        // Redirect with success message
        header("Location: http://localhost/e-learning-platform/views/student/courses.php?message=Successfully enrolled in the course.");
        exit();
    }

    // Check if the student is already enrolled in the course
    public function isEnrolled($courseId, $studentId)
    {
        $enrollment = new Enrollment();
        return $enrollment->checkEnrollment($courseId, $studentId);
    }

    // Optionally, you can add a function to handle unenrollment
    public function unenroll($courseId, $studentId)
    {
        $enrollment = new Enrollment();
        $enrollment->removeEnrollment($courseId, $studentId);

        header("Location: /courses.php?message=Successfully unenrolled from the course.");
        exit();
    }
}
