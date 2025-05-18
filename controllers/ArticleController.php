<?php

require_once '../../models/Article.php';
require_once __DIR__ . '/../core/db.php';

class ArticleController
{
    private $articleModel;

    public function __construct()
    {
        $this->articleModel = new Article();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function createArticle($title, $content)
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
            return ['success' => false, 'error' => 'Unauthorized'];
        }

        if (empty($title) || empty($content)) {
            return ['success' => false, 'error' => 'Title and content are required.'];
        }

        $teacherId = $_SESSION['user_id'];
        $success = $this->articleModel->create($title, $content, $teacherId);

        return ['success' => $success];
    }

    public function getArticlesByTeacher()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
            return ['success' => false, 'error' => 'Unauthorized'];
        }

        return $this->articleModel->getAllByTeacher($_SESSION['user_id']);
    }

    public function getLatestArticles($limit = 3)
    {
        return $this->articleModel->getLatestArticles($limit);
    }

    public function getArticleById($id)
    {
        return $this->articleModel->getArticleById($id);
    }
    public function updateArticle($id, $title, $content)
    {
        return $this->articleModel->update($id, $title, $content);
    }
    public function getAll()
    {
        return $this->articleModel->getAll();
    }
}
