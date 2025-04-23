<?php
require_once '../../core/db.php';

class Lesson
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getByCourseId($courseId)
    {
        $stmt = $this->db->prepare("SELECT * FROM lessons WHERE course_id = ?");
        $stmt->execute([$courseId]);
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM lessons WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($course_id, $title, $content)
    {
        $stmt = $this->db->prepare("INSERT INTO lessons (course_id, title, content) VALUES (?, ?, ?)");
        return $stmt->execute([$course_id, $title, $content]);
    }

    public function update($id, $title, $content)
    {
        $stmt = $this->db->prepare("UPDATE lessons SET title = ?, content = ? WHERE id = ?");
        return $stmt->execute([$title, $content, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM lessons WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
