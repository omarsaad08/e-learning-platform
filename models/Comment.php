<?php
require_once __DIR__ . '/../core/Database.php';

class Comment
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getByArticleId($articleId)
    {
        $stmt = $this->db->prepare("SELECT * FROM comments WHERE article_id = ?");
        $stmt->execute([$articleId]);
        return $stmt->fetchAll();
    }

    public function create($article_id, $user_id, $content)
    {
        $stmt = $this->db->prepare("INSERT INTO comments (article_id, user_id, content) VALUES (?, ?, ?)");
        return $stmt->execute([$article_id, $user_id, $content]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM comments WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
