<?php
include('../../controllers/LessonController.php');

$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;
$controller = new LessonController();
$lessons = $LessonController->fetchCourseLessons($course_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Courses</title>

  <!-- Fonts + Bootstrap -->
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Roboto&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../public/css/videos.css" />
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar Playlist -->
      <div class="col-md-3 sidebar bg-light p-3">
        <h5 class="mb-4">Course Playlist</h5>
        <div id="playlist">
          <?php foreach ($lessons as $index => $lesson): ?>
            <div class="playlist-item <?php echo $index === 0 ? 'playlist-active' : ''; ?>"
                 data-video="<?php echo htmlspecialchars($lesson['video_url']); ?>">
              <?php echo htmlspecialchars($lesson['title']); ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Video Player + Buttons -->
      <div class="col-md-9 py-4 px-5 position-relative">
        <div class="video-player mb-4" style="aspect-ratio: 16/9;">
          <!-- YouTube API will replace this div with iframe -->
          <div id="mainVideo"></div>
        </div>

        <div class="container_buttons">
          <div class="buttons">
            <button class="btn" id="next-btn"><span>Next</span></button>
            <button class="btn" id="mark-complete-btn" style="width:200px; background-color:rgb(79, 94, 230);">
              <span>Mark As Complete</span>
            </button>
            <button class="btn" id="prev-btn"><span>Previous</span></button>
          </div>
        </div>

        <!-- Progress Bar -->
        <div class="progress mt-4" style="height: 6px;">
          <div class="progress-bar bg-success" id="progressBar" style="width: 0%; transition: width 0.3s;"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
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

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://www.youtube.com/iframe_api"></script>
  <script src="../../public/js/videos.js"></script>
</body>
</html>
