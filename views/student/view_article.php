<?php
session_start();
require_once '../../includes/dbh.inc.php';

// Check if 'id' is in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('Article ID not provided.');
}

$article_id = intval($_GET['id']);

// Fetch the article from the database
$stmt = $pdo->prepare("SELECT a.*, u.name AS author_name 
                       FROM articles a 
                       JOIN users u ON a.id = u.id 
                       WHERE a.id = ?");
$stmt->execute([$article_id]);
$article = $stmt->fetch(PDO::FETCH_ASSOC);

// If no article found
if (!$article) {
    die('Article not found.');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($article['title']) ?> - Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/article.css">
</head>

<body>
    <?php include('../components/navbar.php'); ?>

    <div class="container_article" style="padding: 40px 20px;">
        <h1><?= htmlspecialchars($article['title']) ?></h1>
        <p style="color: #888;">Written by <strong><?= htmlspecialchars($article['author_name']) ?></strong> on <?= date("F j, Y", strtotime($article['created_at'])) ?></p>
        <hr style="margin: 20px 0;">
        <div style="line-height: 1.7; font-size: 1.1rem;">
            <?= nl2br(htmlspecialchars($article['content'])) ?>
        </div>
    </div>

    <?php include('../components/footer.php'); ?>
</body>

</html>