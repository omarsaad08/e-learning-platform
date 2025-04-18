    <?php
    session_start();
    require '../../includes/dbh.inc.php';
    require '../../includes/teacher/fetch_courses.php';

    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
        header("Location: ../login.php");
        exit();
    }

    $teacher_id = $_SESSION['user_id'];
    $courses = getTeacherCourses($teacher_id, $pdo);

    // You can do the same for articles soon
    $articles_stmt = $pdo->prepare("SELECT * FROM articles WHERE teacher_id = ?");
    $articles_stmt->execute([$teacher_id]);
    $articles = $articles_stmt->fetchAll();
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Teacher Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="bg-light">
        <div class="container mt-5">
            <h2>Welcome, Teacher!</h2>

            <!-- Create New -->
            <div class="my-4">
                <a href="create_course.php" class="btn btn-primary">+ Create New Course</a>
                <a href="create_article.php" class="btn btn-secondary">+ Write New Article</a>
            </div>

            <!-- Courses -->
            <h4>Your Courses</h4>
            <div class="row">
                <?php foreach ($courses as $course): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <?php if ($course['thumbnail']): ?>
                                <img src="<?= $course['thumbnail'] ?>" class="card-img-top" alt="Thumbnail">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($course['title']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($course['description']) ?></p>
                                <a href="create_lesson.php?course_id=<?= $course['id'] ?>" class="btn btn-sm btn-outline-primary mt-2">
                                    + Add Lesson
                                </a>
                                <a href="view_course.php?course_id=<?= $course['id'] ?>" class="btn btn-sm btn-outline-secondary mt-2 ms-2">
                                    👁️ View Course
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Articles -->
            <h4 class="mt-5">Your Articles</h4>
            <ul class="list-group">
                <?php foreach ($articles as $article): ?>
                    <li class="list-group-item">
                        <h6><?= htmlspecialchars($article['title']) ?></h6>
                        <p><?= htmlspecialchars(substr($article['content'], 0, 100)) ?>...</p>
                        <a href="create_lesson.php?course_id=<?= $course['id'] ?>" class="btn btn-sm btn-outline-primary mt-2">
                            + Add Lesson
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </body>

    </html>