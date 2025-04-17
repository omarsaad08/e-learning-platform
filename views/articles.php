<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Master programming from beginner to advanced with interactive online courses in Python, JavaScript, web development, data science, and more. Learn at your own pace with real-world projects and expert instructors.">
  <meta name="keywords" content="learn programming, online coding courses, programming for beginners, advanced coding tutorials, Python course, JavaScript training, HTML CSS course, web development bootcamp, data science classes, machine learning tutorials, full stack development, front end development, back end programming, coding interview prep, software engineering course, mobile app development, React course, Node.js training, coding for kids, self-paced coding lessons, interactive coding platform, build real-world projects, computer science fundamentals, AI programming course, online coding certification, remote coding school, code with projects, programming mentorship, tech career training, coding challenges, algorithm tutorials, css, js, html,c++, data structure ,oop, computer ,programming,courses">
  <link rel="stylesheet" href="../public/css/style.css">

  <title>Articles</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="page"></div>
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
<div class="page">
    <!-- Filter Toggle Button (Visible on small screens) -->
    <button class="filter-toggle" id="filterButton">Filters</button>

    <!-- Sidebar Filters -->
    <aside class="sidebar" id="sidebar">
      <h2>Filter Courses</h2>
      <div class="filter-group">
        <h4>Topic</h4>
        <label><input type="checkbox" value="frontend"> Frontend</label>
        <label><input type="checkbox" value="backend"> Backend</label>
        <label><input type="checkbox" value="career"> Career Tips</label>
      </div>
      <div class="filter-group">
        <h4>Level</h4>
        <label><input type="checkbox" value="beginner"> Beginner</label>
        <label><input type="checkbox" value="intermediate"> Intermediate</label>
        <label><input type="checkbox" value="advanced"> Advanced</label>
      </div>
    </aside>

    <!-- START: Articles Page -->


    <!-- Articles Content -->
    <main class="content">
      <div class="topbar">
        <h1>All Articles</h1>
        <input type="text" placeholder="Search articles..." class="search-box">
      </div>

      <div class="grid" id="articlesContainer">
        <!-- Sample Article Card -->
        <div class="card" data-topic="frontend" data-level="beginner">
          <img src="images/article1.jpg" alt="Frontend Tips" />
          <h3>Frontend Tips for Beginners</h3>
          <p>Jane Doe</p>
          <div class="rating">⭐️⭐️⭐️⭐️☆</div>
          <span class="tag beginner">Beginner</span>
          <button class="btn btn-dark">Read</button>
        </div>
        <div class="card" data-topic="frontend" data-level="beginner">
          <img src="images/article1.jpg" alt="Frontend Tips" />
          <h3>Frontend Tips for Beginners</h3>
          <p>Jane Doe</p>
          <div class="rating">⭐️⭐️⭐️⭐️☆</div>
          <span class="tag beginner">Beginner</span>
          <button class="btn btn-dark">Read</button>
        </div>
        <div class="card" data-topic="frontend" data-level="beginner">
          <img src="images/article1.jpg" alt="Frontend Tips" />
          <h3>Frontend Tips for Beginners</h3>
          <p>Jane Doe</p>
          <div class="rating">⭐️⭐️⭐️⭐️☆</div>
          <span class="tag beginner">Beginner</span>
          <button class="btn btn-dark">Read</button>
        </div>
        <div class="card" data-topic="frontend" data-level="beginner">
          <img src="images/article1.jpg" alt="Frontend Tips" />
          <h3>Frontend Tips for Beginners</h3>
          <p>Jane Doe</p>
          <div class="rating">⭐️⭐️⭐️⭐️☆</div>
          <span class="tag beginner">Beginner</span>
          <button class="btn btn-dark">Read</button>
        </div>
        <div class="card" data-topic="frontend" data-level="beginner">
          <img src="images/article1.jpg" alt="Frontend Tips" />
          <h3>Frontend Tips for Beginners</h3>
          <p>Jane Doe</p>
          <div class="rating">⭐️⭐️⭐️⭐️☆</div>
          <span class="tag beginner">Beginner</span>
          <button class="btn btn-dark">Read</button>
        </div>
        <div class="card" data-topic="frontend" data-level="beginner">
          <img src="images/article1.jpg" alt="Frontend Tips" />
          <h3>Frontend Tips for Beginners</h3>
          <p>Jane Doe</p>
          <div class="rating">⭐️⭐️⭐️⭐️☆</div>
          <span class="tag beginner">Beginner</span>
          <button class="btn btn-dark">Read</button>
        </div>
        <!-- Add more article cards here -->
      </div>
    </main>

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

  <script src="../public/js/script.js"></script>
</body>

</html>