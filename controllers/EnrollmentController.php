<?php

require_once '../models/Enrollment.php'; // Assuming your Enrollment model exists
require_once '../models/User.php'; // Assuming you have a User model
require_once '../models/Course.php'; // Assuming you have a Course model

class EnrollmentsController
{

    // Enroll a student in a course
    public function enroll($courseId, $studentId)
    {
        // Check if the student is already enrolled
        if ($this->isEnrolled($courseId, $studentId)) {
            header("Location: /courses.php?message=You are already enrolled in this course.");
            exit();
        }

        // Proceed with enrollment
        $enrollment = new Enrollment();
        $enrollment->enrollStudent($courseId, $studentId);

        // Redirect with success message
        header("Location: /courses.php?message=Successfully enrolled in the course.");
        exit();
    }

    // Check if the student is already enrolled in the course
    private function isEnrolled($courseId, $studentId)
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
