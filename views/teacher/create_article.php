<?php
require_once '../../controllers/ArticleController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $controller = new ArticleController();

  $title = trim($_POST['title']);
  $content = trim($_POST['content']);

  $result = $controller->createArticle($title, $content);

  if ($result['success']) {
    header("Location: ../../views/teacher/teacher_home.php");
    exit;
  } else {
    echo "Error: " . $result['error'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Write Article</title>

  <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../public/css/article.css">
</head>

<body>

  <div class="container_article">
    <h1>Write Your Article</h1>

    <form action="" method="POST">
      <div class="mb-3">
        <input type="text" name="title" id="title" class="form-control" placeholder="Article Title" required>
      </div>


      <div class="mb-3">
        <textarea name="content" id="article" placeholder="Start writing your article..." required></textarea>
      </div>

      <button type="submit" class="submit-btn">Submit</button>
    </form>
  </div>

  <script src="../../public/js/article.js"></script>
</body>

</html>