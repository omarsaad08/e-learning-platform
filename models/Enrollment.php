<?php
require_once __DIR__ . '/../core/db.php';

class Enrollment
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    // Check if the student is already enrolled in the course
    public function checkEnrollment($courseId, $studentId)
    {
        $sql = "SELECT * FROM enrollments WHERE student_id = ? AND course_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$studentId, $courseId]);

        return $stmt->rowCount() > 0;  // Return true if enrolled, false otherwise
    }

    // Enroll a student in a course
    public function enrollStudent($courseId, $studentId)
    {
        $sql = "INSERT INTO enrollments (course_id, student_id) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$courseId, $studentId]);
    }

    // Remove a student's enrollment from a course
    public function removeEnrollment($courseId, $studentId)
    {
        $sql = "DELETE FROM enrollments WHERE student_id = ? AND course_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$studentId, $courseId]);
    }
}
