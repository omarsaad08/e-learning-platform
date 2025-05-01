<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$userType = $_SESSION['role'] ?? 'student';
?>
<link rel="stylesheet" href="../../public/css/nav.css">
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <h1 class="logo">MyCourses</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php
                if ($userType == "student") {
                    echo '<li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/e-learning-platform/views/student/home.php">Home</a>
                </li>';
                } else if ($userType == "teacher") {
                    echo '<li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/e-learning-platform/views/teacher/teacher_home.php">Home</a>
                </li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/e-learning-platform/views/student/courses.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/e-learning-platform/views/student/articles.php">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/e-learning-platform/views/student/profile.php">Profile</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>