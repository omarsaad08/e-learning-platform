<?php
include('../../controllers/LessonController.php');

$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;
$controller = new LessonController();
$lessons = $LessonController->fetchCourseLessons($course_id);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Master programming from beginner to advanced with interactive online courses in Python, JavaScript, web development, data science, and more. Learn at your own pace with real-world projects and expert instructors.">
  <meta name="keywords" content="learn programming, online coding courses, programming for beginners, advanced coding tutorials, Python course, JavaScript training, HTML CSS course, web development bootcamp, data science classes, machine learning tutorials, full stack development, front end development, back end programming, coding interview prep, software engineering course, mobile app development, React course, Node.js training, coding for kids, self-paced coding lessons, interactive coding platform, build real-world projects, computer science fundamentals, AI programming course, online coding certification, remote coding school, code with projects, programming mentorship, tech career training, coding challenges, algorithm tutorials, css, js, html,c++, data structure ,oop, computer ,programming,courses">

  <title>Courses</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --bg: #f8f9fa;
      --text: #212529;
      --sidebar-bg: #ffffff;
      --card-bg: #ffffff;
      --border: #dee2e6;
    }

    [data-theme="dark"] {
      --bg: #1d1c1c;
      --text: #f8f9fa;
      --sidebar-bg: #2c2c2c;
      --card-bg: #343a40;
      --border: #444;
    }
  </style>
  <link rel="stylesheet" href="../../public/css/videos.css">
</head>

<body>


  <nav class="navbar">
    <div class="container">

      <h1 class="logo">MyCourses</h1>
      <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="courses.php">Courses</a></li>
        <li><a href="articles.php">Articles</a></li>
        <li><a href="#">About</a></li>
      </ul>
    </div>

  </nav>


  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 sidebar">
        <h5 class="mb-4">Course Playlist</h5>
        <div id="playlist">
          <?php foreach ($lessons as $index => $lesson): ?>
            <div class="playlist-item <?= $index === 0 ? 'playlist-active' : '' ?>"
              data-url="<?= htmlspecialchars($lesson['video_url']) ?>"
              data-title="<?= htmlspecialchars($lesson['title']) ?>">
              <?= htmlspecialchars($lesson['title']) ?>
            </div>
          <?php endforeach; ?>
        </div>


      </div>

      <!-- Main Video Content -->
      <div class="col-md-9 py-4 px-5 position-relative">
        <!-- Theme Toggle -->
        <div class="form-check form-switch theme-toggle">
          <input class="form-check-input" type="checkbox" id="darkModeToggle">
          <label class="form-check-label" for="darkModeToggle">Dark Mode</label>
        </div>

        <div class="video-player mb-4">
          <video id="mainVideo" width="100%" height="100%" controls>
            <source src="../../<?= htmlspecialchars($lessons[0]['video_url']) ?>" type="video/mp4">
            Your browser does not support the video tag.
          </video>

        </div>
        <h3 id="videoTitle">Intro to the Course</h3>
        <p>Welcome to your first lesson. Watch the video and continue down the playlist to master each topic.</p>
      </div>
    </div>
  </div>
  <!-- END: Articles Page -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-about">
        <h3>MyCourses</h3>
        <p>An interactive platform to learn programming from beginner to advanced levels.</p>
      </div>

      <div class="footer-links">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="courses.php">Courses</a></li>
          <li><a href="articles.php">Articles</a></li>
          <li><a href="#">About</a></li>
        </ul>
      </div>

      <div class="footer-social">
        <h4>Follow Us</h4>
        <div class="social-icons">
          <a href="#"><img src="../public/images/facebook_black_logo_icon_147136.png" alt="Facebook" /></a>
          <a href="#"><img src="../public/images/twitterlogoincircularblackbutton_79784.png" alt="Twitter" /></a>
          <a href="#"><img src="../public/images/instagram_black_logo_icon_147122.png" alt="instagram" /></a>

          <a href="#"><img src="../public/images/linkedin_black_logo_icon_147114.png" alt="linkedin" /></a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© 2025 MyCourses. All rights reserved.</p>
    </div>
  </footer>
  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../public/videos.js"></script>
</body>

</html>