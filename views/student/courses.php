<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Master programming from beginner to advanced with interactive online courses in Python, JavaScript, web development, data science, and more. Learn at your own pace with real-world projects and expert instructors.">
  <meta name="keywords" content="learn programming, online coding courses, programming for beginners, advanced coding tutorials, Python course, JavaScript training, HTML CSS course, web development bootcamp, data science classes, machine learning tutorials, full stack development, front end development, back end programming, coding interview prep, software engineering course, mobile app development, React course, Node.js training, coding for kids, self-paced coding lessons, interactive coding platform, build real-world projects, computer science fundamentals, AI programming course, online coding certification, remote coding school, code with projects, programming mentorship, tech career training, coding challenges, algorithm tutorials, css, js, html,c++, data structure ,oop, computer ,programming,courses">
  <link rel="stylesheet" href="../../public/css/style.css">
  <title>Courses</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
      <div class="filter-group">
        <h4>Category</h4>
        <label><input type="checkbox" value="web"> Web Development</label>
        <label><input type="checkbox" value="data"> Data Science</label>
        <label><input type="checkbox" value="ai"> AI & ML</label>
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
        <h1>All Courses</h1>
        <input type="text" placeholder="Search courses..." class="search-box">
      </div>
      <div class="container">
        <div class="row">
          <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-info text-center">
              <?= htmlspecialchars($_GET['message']) ?>
            </div>
          <?php endif; ?>

          <?php
          include('../../includes/dbh.inc.php');

          $sql = "
      SELECT c.*, u.name AS instructor_name
      FROM courses c
      JOIN users u ON c.teacher_id = u.id
    ";
          $stmt = $pdo->query($sql);
          $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

          if (count($courses) > 0) {
            session_start();
            $currentUserId = $_SESSION['user_id'] ?? null;
            foreach ($courses as $course) {
              $title = htmlspecialchars($course['title']);
              $instructor = htmlspecialchars($course['instructor_name'] ?? 'N/A');
              $level = htmlspecialchars($course['level']);
              $category = htmlspecialchars($course['category']);
              $image = htmlspecialchars($course['thumbnail']);
              $rating = floatval($course['rating']);

              $stars = str_repeat("⭐️", floor($rating));
              if (fmod($rating, 1) >= 0.5) {
                $stars .= "✨";
              }


              // Check if the user is enrolled in this course
              $isEnrolled = false;
              if ($currentUserId) {
                $checkEnroll = $pdo->prepare("SELECT * FROM enrollments WHERE student_id = ? AND course_id = ?");
                $checkEnroll->execute([$currentUserId, $course['id']]);
                $isEnrolled = $checkEnroll->rowCount() > 0;
              }

              echo "
  <div class='col-md-4 mb-4'>
    <div class='card h-100' data-category='$category' data-level='$level'>
      <img src='$image' class='card-img-top' alt='$title' />
      <div class='card-body'>
        <h5 class='card-title'>$title</h5>
        <p class='card-text'>Instructor: $instructor</p>
        <div class='rating'>$stars</div>
        <span class='badge bg-secondary'>$level</span>
      </div>
      <div class='card-footer text-center'>";
              if ($isEnrolled) {
                echo "<a href='videos.php?course_id= {$course['id']} ?>'>Watch Course</a>";
              } else {
                echo "
        <form action=\"../../includes/student/enroll.php\" method=\"POST\">
          <input type=\"hidden\" name=\"course_id\" value=\"{$course['id']}\">
          <button type=\"submit\" class=\"btn btn-dark\">Enroll</button>
        </form>";
              }
              echo "</div></div></div>";
            }
          } else {
            echo "<p>No courses found.</p>";
          }
          ?>
        </div>
      </div>

      <!-- END: Articles Page -->
      <?php
      include('../components/footer.php');
      ?>


      <script src="../../public/js/script.js"></script>
</body>

</html>