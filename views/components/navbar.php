<?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

$userType = $_SESSION['role'] ?? 'student';
?>
<link rel="stylesheet" href="../../public/css/nav.css">
<nav class="navbar">
    <div class="container">
        <h1 class="logo">MyCourses</h1>
        <ul class="nav-links">
            <?php
            if ($userType == "student") {
                echo '<li><a href="/e-learning-platform/views/student/home.php">Home</a></li>';
            } else if ($userType == "teacher") {
                echo '<li><a href="/e-learning-platform/views/teacher/teacher_home.php">Home</a></li>';
            }
            ?>
            <li><a href="/e-learning-platform/views/student/courses.php">Courses</a></li>
            <li><a href="/e-learning-platform/views/student/articles.php">Articles</a></li>
            <li><a href="/e-learning-platform/views/mutual/profile.php">Profile</a></li>
        </ul>
    </div>

</nav>