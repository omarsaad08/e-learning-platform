<?php
require_once '../../controllers/ArticleController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ArticleController();

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    $result = $controller->updateArticle($_GET['article_id'], $title, $content);
    if ($result) {
        header("Location: ../../views/teacher/teacher_home.php");
        exit;
    } else {
        echo "Error: ";
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller = new ArticleController();
    $article = $controller->getArticleById($_GET['article_id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../components/headImports.php'); ?>
    <title>Edit Article</title>
    <link rel="stylesheet" href="../../public/css/article.css">
</head>

<body>

    <div class="container_article">
        <h1>edit Your Article</h1>

        <form action="" method="POST">
            <div class="mb-3">
                <input type="text" name="title" id="title" value="<?php echo $article['title']; ?>" class="form-control" placeholder="Article Title" required>
            </div>


            <div class="mb-3">
                <textarea name="content" id="content" placeholder="Start writing your article..." required><?php echo $article['content']; ?></textarea>
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>

    <script src="../../public/js/article.js"></script>
</body>

</html>