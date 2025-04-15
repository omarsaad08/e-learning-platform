<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Teacher Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">Welcome, Teacher!</h1>

        <div class="mb-4 d-flex gap-3">
            <a href="create_course.php" class="btn btn-primary">➕ New Course</a>
            <a href="create_article.php" class="btn btn-success">📝 Write Article</a>
        </div>

        <h2>Your Courses</h2>
        <ul id="coursesList" class="list-group mb-5"></ul>

        <h2>Your Articles</h2>
        <ul id="articlesList" class="list-group"></ul>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            fetch("backend/fetch_courses.php")
                .then(res => res.json())
                .then(data => {
                    const list = document.getElementById("coursesList");
                    if (data.length) {
                        data.forEach(course => {
                            const li = document.createElement("li");
                            li.className = "list-group-item";
                            li.textContent = course.title;
                            list.appendChild(li);
                        });
                    } else {
                        list.innerHTML = '<li class="list-group-item">No courses yet.</li>';
                    }
                });

            fetch("backend/fetch_articles.php")
                .then(res => res.json())
                .then(data => {
                    const list = document.getElementById("articlesList");
                    if (data.length) {
                        data.forEach(article => {
                            const li = document.createElement("li");
                            li.className = "list-group-item";
                            li.textContent = article.title;
                            list.appendChild(li);
                        });
                    } else {
                        list.innerHTML = '<li class="list-group-item">No articles yet.</li>';
                    }
                });
        });
    </script>
</body>

</html>