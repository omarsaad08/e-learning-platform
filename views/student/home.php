<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../components/headImports.php');
    ?>
    <title>Home</title>
    <link rel="stylesheet" href="../../public/css/home.css">
</head>

<body>
    <?php
    include('../components/navbar.php');
    require_once '../../controllers/CourseController.php';
    require_once '../../controllers/ArticleController.php';

    $courseController = new CourseController();
    $articleController = new ArticleController();

    $randomCourses = $courseController->getRandomCourses(3);
    $latestArticles = $articleController->getLatestArticles(3);
    ?>


    <div class="main">
        <section class="hero">
            <h2>Welcome to MyCourses</h2>
            <p>Learn, explore, and grow your skills in tech!</p>
        </section>


        <section class="cards">
            <h2 style="width: 100%; text-align: center;">
                Some Featured Courses
            </h2>
            <?php foreach ($randomCourses as $course): ?>
                <div class="card">
                    <h3><?= htmlspecialchars($course['title']) ?></h3>
                    <img src="<?= htmlspecialchars($course['thumbnail']) ?>" alt="<?= htmlspecialchars($course['title']) ?>">
                    <p><?= htmlspecialchars($course['description']) ?></p>
                </div>
            <?php endforeach; ?>
        </section>

        <section class="cards">
            <h2 style="width: 100%; text-align: center;">Latest Articles</h2>
            <?php foreach ($latestArticles as $article): ?>
                <div class="card">
                    <h3><?= htmlspecialchars($article['title']) ?></h3>
                    <p><?= htmlspecialchars(substr($article['content'], 0, 100)) ?>...</p>
                    <a href="view_article.php?id=<?= $article['id'] ?>" class="btn">Read More</a>
                </div>
            <?php endforeach; ?>
        </section>


    </div>
    <?php
    include('../components/footer.php');
    ?>
</body>

</html>