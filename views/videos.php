<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Master programming from beginner to advanced..." />
  <meta name="keywords" content="learn programming, online coding courses, ..." />
  <title>Courses</title>

  <!-- Fonts and Bootstrap -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Roboto&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../public/css/videos.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <!-- Navbar -->
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

  <!-- Page Content -->
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 sidebar bg-light p-3 ">
        <h5 class="mb-4">Course Playlist</h5>
        <div id="playlist">
          <div class="playlist-item playlist-active" data-video="https://www.youtube.com/embed/dQw4w9WgXcQ">Intro to the Course</div>
          <div class="playlist-item" data-video="https://www.youtube.com/embed/tgbNymZ7vqY">Lesson 1 - HTML Basics</div>
          <div class="playlist-item" data-video="https://www.youtube.com/embed/y6120QOlsfU">Lesson 2 - CSS Foundations</div>
          <div class="playlist-item" data-video="https://www.youtube.com/embed/3fumBcKC6RE">Lesson 3 - Responsive Design</div>

          <div class="playlist-item" data-video="https://www.youtube.com/embed/tgbNymZ7vqY">Lesson 1 - HTML Basics</div>
          <div class="playlist-item" data-video="https://www.youtube.com/embed/y6120QOlsfU">Lesson 2 - CSS Foundations</div>
          <div class="playlist-item" data-video="https://www.youtube.com/embed/3fumBcKC6RE">Lesson 3 - Responsive Design</div>

          <div class="playlist-item" data-video="https://www.youtube.com/embed/tgbNymZ7vqY">Lesson 1 - HTML Basics</div>
          <div class="playlist-item" data-video="https://www.youtube.com/embed/y6120QOlsfU">Lesson 2 - CSS Foundations</div>
          <div class="playlist-item" data-video="https://www.youtube.com/embed/3fumBcKC6RE">Lesson 3 - Responsive Design</div>
      
          <div class="playlist-item" data-video="https://www.youtube.com/embed/tgbNymZ7vqY">Lesson 1 - HTML Basics</div>
          <div class="playlist-item" data-video="https://www.youtube.com/embed/y6120QOlsfU">Lesson 2 - CSS Foundations</div>
          <div class="playlist-item" data-video="https://www.youtube.com/embed/3fumBcKC6RE">Lesson 3 - Responsive Design</div>
         
          <div class="playlist-item" data-video="https://www.youtube.com/embed/tgbNymZ7vqY">Lesson 1 - HTML Basics</div>
          <div class="playlist-item" data-video="https://www.youtube.com/embed/y6120QOlsfU">Lesson 2 - CSS Foundations</div>
          <div class="playlist-item" data-video="https://www.youtube.com/embed/3fumBcKC6RE">Lesson 3 - Responsive Design</div>

          <div class="playlist-item" data-video="https://www.youtube.com/embed/tgbNymZ7vqY">Lesson 1 - HTML Basics</div>
          <div class="playlist-item" data-video="https://www.youtube.com/embed/y6120QOlsfU">Lesson 2 - CSS Foundations</div>
          <div class="playlist-item" data-video="https://www.youtube.com/embed/3fumBcKC6RE">Lesson 3 - Responsive Design</div>
        </div>
      </div>

      <!-- Video Area -->
       
      <div class="col-md-9 py-4 px-5 position-relative">
      <div class="d-flex justify-content-between align-items-center mb-3">
  <button id="prevBtn" class="btn btn-light"><i class="bi bi-chevron-left"></i> Previous</button>

  <button id="startLearningBtn" class="btn btn-primary">
    Start learning <i class="bi bi-chevron-right"></i>
  </button>

  <button id="nextBtn" class="btn btn-light">Next <i class="bi bi-chevron-right"></i></button>
</div>

<div class="form-check mb-4">
  <input class="form-check-input" type="checkbox" id="markComplete">
  <label class="form-check-label" for="markComplete">
    Mark as complete
  </label>
</div>

<!-- Already discussed earlier -->
<div class="progress mb-4">
  <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;">0%</div>
</div>




    <div class="video-player mb-4" style="aspect-ratio: 16/9;">
  <iframe id="mainVideo" width="100%" height="100%" src="https://www.youtube.com/embed/dQw4w9WgXcQ?enablejsapi=1" frameborder="0" allowfullscreen></iframe>
</div>

  </div>

  <!-- Footer -->
  <footer class="footer mt-5">
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
          <a href="#"><img src="../public/images/instagram_black_logo_icon_147122.png" alt="Instagram" /></a>
          <a href="#"><img src="../public/images/linkedin_black_logo_icon_147114.png" alt="LinkedIn" /></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2025 MyCourses. All rights reserved.</p>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script src="../public/js/videos.js"></script>

</body>

</html>
