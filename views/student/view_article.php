<?php
session_start();
require_once __DIR__ . '/../../controllers/ArticleController.php';
// Check if 'id' is in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('Article ID not provided.');
}

$article_id = intval($_GET['id']);
$controller = new ArticleController();
$article = $controller->getArticleById($article_id);

if (!$article) {
    die('Article not found.');
} else {
    require_once __DIR__ . '/../../controllers/AuthController.php';
    $auth = new AuthController();
    $user = $auth->getUserById($_SESSION['user_id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../components/headImports.php');
    ?>
    <title><?= htmlspecialchars($article['title']) ?> - Article</title>
    <link rel="stylesheet" href="../../public/css/article.css">
</head>

<body>

    <div class="container_article" style="padding: 40px 20px;">
        <h1><?= htmlspecialchars($article['title']) ?></h1>
        <p style="color: #888;">Written by <strong><?= htmlspecialchars($user['name']) ?></strong> on <?= date("F j, Y", strtotime($article['created_at'])) ?></p>
        <hr style="margin: 20px 0;">
        <div style="line-height: 1.7; font-size: 1.1rem;">
            <?= nl2br(htmlspecialchars($article['content'])) ?>
        </div>
    </div>
</body>

</html>