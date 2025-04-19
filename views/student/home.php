<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
    <?php
    include('../components/navbar.php');
    include('../../includes/dbh.inc.php');
    // Fetch 3 random courses
    $stmt = $pdo->query("SELECT * FROM courses ORDER BY RAND() LIMIT 3");
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Fetch 3 latest articles
    $stmt = $pdo->query("SELECT * FROM articles ORDER BY created_at DESC LIMIT 3");
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>


    <div class="main" style="background-image: url('../../public/images/home-background.svg');
    background-size: cover;
    background-repeat: no-repeat;">
        <section class="hero">
            <h2>Welcome to MyCourses</h2>
            <p>Learn, explore, and grow your skills in tech!</p>
        </section>


        <section class="cards">
            <?php foreach ($courses as $course): ?>
                <div class="card">
                    <h3><?= htmlspecialchars($course['title']) ?></h3>
                    <img src="<?= htmlspecialchars($course['thumbnail']) ?>" alt="<?= htmlspecialchars($course['title']) ?>">
                    <p><?= htmlspecialchars($course['description']) ?></p>
                </div>
            <?php endforeach; ?>
        </section>

        <section class="cards">
            <h2 style="width: 100%; text-align: center;">Latest Articles</h2>
            <?php foreach ($articles as $article): ?>
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