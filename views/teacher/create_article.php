<?php
require_once __DIR__ . '/../../controllers/auth_check.php';
require_once '../../controllers/ArticleController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $controller = new ArticleController();

  $title = trim($_POST['title']);
  $content = trim($_POST['content']);

  $result = $controller->createArticle($title, $content);

  if ($result['success']) {
    header("Location: ../../views/teacher/teacher_home.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('../components/headImports.php');
  ?>
  <title>Write Article</title>
  <link rel="stylesheet" href="../../public/css/article.css">
</head>

<body>



  <div class="container_article">
    <h1>Write Your Article</h1>

    <form action="" method="POST">
      <div class="mb-3">
        <input type="text" name="title" id="title" class="form-control" placeholder="Article Title">
      </div>


      <div class="mb-3">
        <textarea name="content" id="article" placeholder="Start writing your article..."></textarea>
      </div>

      <button type="submit" class="submit-btn">Submit</button>

      <span class="error <?= isset($result['error']) ? 'd-block' : ''; ?>"><?php echo isset($result['error']) ? $result['error'] : ''; ?></span>
    </form>
  </div>


  <script src="../../public/js/article.js"></script>
  <script src="../../public/js/forceReload.js"></script>
</body>

</html>