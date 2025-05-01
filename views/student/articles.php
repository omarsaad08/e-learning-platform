<?php
require_once '../../controllers/ArticleController.php';
$controller = new ArticleController();
$articles = $controller->getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('../components/headImports.php'); ?>
  <link rel="stylesheet" href="../../public/css/courses.css">
  <title>Articles</title>
</head>

<body>

  <?php include('../components/navbar.php'); ?>

  <div class="page">
    <!-- Sidebar Filters
    <aside class="sidebar" id="sidebar">
      <h2>Filter Articles</h2>
      <div class="filter-group">
        <h4>Topic</h4>
        <label><input type="checkbox" value="frontend"> Frontend</label>
        <label><input type="checkbox" value="backend"> Backend</label>
        <label><input type="checkbox" value="career"> Career Tips</label>
      </div>
      <div class="filter-group">
        <h4>Level</h4>
        <label><input type="checkbox" value="beginner"> Beginner</label>
        <label><input type="checkbox" value="intermediate"> Intermediate</label>
        <label><input type="checkbox" value="advanced"> Advanced</label>
      </div>
    </aside> -->

    <!-- Articles Content -->
    <main class="content">
      <div class="topbar">
        <h1>All Articles</h1>
        <input type="text" placeholder="Search articles..." class="search-box">
      </div>

      <div class="grid articles" id="articlesContainer">
        <?php if (!empty($articles)): ?>
          <?php foreach ($articles as $article): ?>
            <div class="card" data-title="<?= strtolower(htmlspecialchars($article['title'])) ?>" data-topic="frontend" data-level="beginner">
              <h3><?= htmlspecialchars($article['title']) ?></h3>
              <p><?= htmlspecialchars($article['teacher_name'] ?? 'Unknown Teacher') ?></p>
              <a href="view_article.php?id=<?= $article['id'] ?>" class="btn btn-dark">Read</a>
            </div>

          <?php endforeach; ?>
        <?php else: ?>
          <p>No articles found.</p>
        <?php endif; ?>
      </div>
    </main>
  </div>

  <!-- Footer -->
  <?php
  include('../components/footer.php');
  ?>

  <script src="../../public/js/articles.js"></script>
</body>

</html>