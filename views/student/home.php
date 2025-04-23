<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../../public/css/style.css">
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


    <div class="main" style="background-image: url('../../public/images/home-background.svg');
    background-size: cover;
    background-repeat: no-repeat;">
        <section class="hero">
            <h2>Welcome to MyCourses</h2>
            <p>Learn, explore, and grow your skills in tech!</p>
        </section>


        <section class="cards">
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