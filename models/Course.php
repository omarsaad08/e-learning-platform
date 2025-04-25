<?php
require_once '../../core/db.php';

class Course
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllCourses()
    {
        $stmt = $this->db->prepare("SELECT * FROM courses");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCourseById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function getTeacherCourses($teacher_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM courses WHERE teacher_id = ?");
        $stmt->execute([$teacher_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRandomCourses($limit = 3)
    {
        $stmt = $this->db->prepare("SELECT * FROM courses ORDER BY RAND() LIMIT ?");
        $stmt->bindValue(1, (int) $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title, $description, $category, $level, $teacher_id, $thumbnail)
    {
        $stmt = $this->db->prepare("INSERT INTO courses (title, description, category, level, teacher_id, thumbnail) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$title, $description, $category, $level, $teacher_id, $thumbnail]);
    }

    public function update($id, $title, $description)
    {
        $stmt = $this->db->prepare("UPDATE courses SET title = ?, description = ? WHERE id = ?");
        return $stmt->execute([$title, $description, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM courses WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
