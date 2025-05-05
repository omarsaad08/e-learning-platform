<?php

include('../../controllers/CourseController.php');
include('../../controllers/EnrollmentController.php');
$coursesController = new CourseController();
$enrollmentController = new EnrollmentsController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  session_start();
  require_once '../../controllers/EnrollmentController.php';
  $enrollmentController = new EnrollmentsController();
  // var_dump($_POST['course_id']);
  if ($_POST['course_id']) {
    $enrollmentController->enroll($_POST['course_id'], $_SESSION['user_id']);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('../components/headImports.php');
  ?>
  <title>Courses</title>
  <link rel="stylesheet" href="../../public/css/courses.css">
</head>
</head>

<body>


  <?php
  include('../components/navbar.php');
  ?>

  <div class="page">

    <!-- Filter Toggle Button (Visible on small screens) -->
    <button class="filter-toggle" id="filterButton">Filters</button>

    <!-- Sidebar Filters -->
    <aside class="sidebar" id="sidebar">
      <h2>Filter Courses</h2>
      <?php
      $categories = $coursesController->getAllCategories(); // Add this above the sidebar
      ?>

      <div class="filter-group">
        <h4>Category</h4>
        <?php foreach ($categories as $cat): ?>
          <label>
            <input type="checkbox" class="category-filter" value="<?= strtolower($cat['name']) ?>">
            <?= htmlspecialchars($cat['name']) ?>
          </label>
        <?php endforeach; ?>
      </div>

      <div class="filter-group">
        <h4>Level</h4>
        <label><input type="checkbox" value="beginner"> Beginner</label>
        <label><input type="checkbox" value="intermediate"> Intermediate</label>
        <label><input type="checkbox" value="advanced"> Advanced</label>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="content">
      <div class="topbar">
        <h1 style="font-weight:700;">All Courses</h1>
        <input type="text" placeholder="Search articles..." class="search-box">      </div>
      <div class="container">
        <div class="row">
          <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-info text-center">
              <?= htmlspecialchars($_GET['message']) ?>
            </div>
          <?php endif; ?>

          <?php
          $courses = $coursesController->getAllCourses();

          if (count($courses) > 0) {
            $currentUserId = $_SESSION['user_id'] ?? null;
            foreach ($courses as $course) {
              $title = htmlspecialchars($course['title']);
              $instructor = htmlspecialchars($course['instructor_name'] ?? 'N/A');
              $level = htmlspecialchars($course['level']);
              $category = htmlspecialchars($course['category']);
              $image = htmlspecialchars($course['thumbnail']);
           

              // Check if the user is enrolled in this course
              $isEnrolled = false;
              if ($currentUserId) {
                $isEnrolled = $enrollmentController->isEnrolled($course['id'], $currentUserId);
              }

              echo "
      <div class='col-lg-4 col-md-6 col-12 mb-4'>
        <div class='card h-100' data-category='$category' data-level='$level'>
          <img src='$image' class='card-img-top' alt='$title' />
          <div class='card-body'>
            <h5 class='card-title'>$title</h5>
            <p class='card-text'>Instructor: $instructor</p>
    
            <span class='badge bg-secondary'>$level</span>
          </div>
      <div class='card-footer text-center'>";
              if ($isEnrolled) {
                echo "<a class=\"watch-enroll\" href='videos.php?course_id= {$course['id']} ?>'>Watch Course</a>";
              } else {
                echo "
                    <form action=\"\" method=\"POST\">
                        <input type=\"hidden\" name=\"course_id\" value=\"{$course['id']}\">
                        <button type=\"submit\" class=\"watch-enroll\">Enroll</button>
                    </form>
                    ";
              }
              echo "</div></div></div>";
            }
          } else {
            echo "<p>No courses found.</p>";
          }
          ?>
        </div>
      </div>
    </main>
  </div>
  <!-- END: Articles Page -->
  <?php
  include('../components/footer.php');
  ?>


  <script src="../../public/js/courses.js"></script>
</body>

</html>