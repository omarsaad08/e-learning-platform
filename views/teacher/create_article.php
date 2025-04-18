<!-- teacher/create_article.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Write Article</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../public/css/article.css">
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

  <div class="container_article">
    <h1>Write Your Article</h1>

    <form action="handle_article.php" method="POST">
      <div class="mb-3">
        <input type="text" name="title" id="title" class="form-control" placeholder="Article Title" required>
      </div>

      <div class="toolbar">
        <button type="button" onclick="formatText('bold')">Bold</button>
        <button type="button" onclick="formatText('highlight')">Highlight</button>
        <button type="button" onclick="clearText()">Clear</button>
      </div>

      <div class="mb-3">
        <textarea name="content" id="article" placeholder="Start writing your article..." required></textarea>
      </div>

      <button type="submit" class="submit-btn">Submit</button>
    </form>
  </div>

  <footer class="footer">
    <div class="footer-container">
      <div class="footer-about">
        <h3>MyCourses</h3>
        <p>An interactive platform to learn programming from beginner to advanced levels.</p>
      </div>

      <div class="footer-links">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Courses</a></li>
          <li><a href="#">Articles</a></li>
          <li><a href="#">About</a></li>
        </ul>
      </div>

      <div class="footer-social">
        <h4>Follow Us</h4>
        <div class="social-icons">
          <a href="#"><img src="../../public/images/facebook_black_logo_icon_147136.png" alt="Facebook" /></a>
          <a href="#"><img src="../../public/images/twitterlogoincircularblackbutton_79784.png" alt="Twitter" /></a>
          <a href="#"><img src="../../public/images/linkedin_black_logo_icon_147114.png" alt="linkedin" /></a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© 2025 MyCourses. All rights reserved.</p>
    </div>
  </footer>

  <script src="../../public/js/article.js"></script>
</body>
</html>
