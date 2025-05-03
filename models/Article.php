<?php
require_once '../../core/db.php';

class Article
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $sql = "
            SELECT 
                articles.*, 
                users.name AS teacher_name, 
                users.email AS teacher_email
            FROM 
                articles
            INNER JOIN 
                users ON articles.teacher_id = users.id
            ORDER BY 
                articles.created_at DESC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getArticleById($id)
    {
        $sql = "SELECT * FROM articles WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function getAllByTeacher($teacherId)
    {
        $stmt = $this->db->prepare("SELECT * FROM articles WHERE teacher_id = ?");
        $stmt->execute([$teacherId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLatestArticles($limit = 3)
    {
        $stmt = $this->db->prepare("SELECT * FROM articles ORDER BY created_at DESC LIMIT ?");
        $stmt->bindValue(1, (int) $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function create($title, $content, $author_id)
    {
        $stmt = $this->db->prepare("INSERT INTO articles (title, content, teacher_id) VALUES (?, ?, ?)");
        return $stmt->execute([$title, $content, $author_id]);
    }

    public function update($id, $title, $content)
    {
        $stmt = $this->db->prepare("UPDATE articles SET title = ?, content = ? WHERE id = ?");
        return $stmt->execute([$title, $content, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM articles WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
