<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('../components/headImports.php');
  ?>
  <link rel="stylesheet" href="../public/css/style.css">

  <title>Articles</title>
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
          <a href="#"><img src="../../public/images/facebook_black_logo_icon_147136.png" alt="Facebook" /></a>
          <a href="#"><img src="../../public/images/twitterlogoincircularblackbutton_79784.png" alt="Twitter" /></a>
          <a href="#"><img src="../../public/images/instagram_black_logo_icon_147122.png" alt="instagram" /></a>

          <a href="#"><img src="../../public/images/linkedin_black_logo_icon_147114.png" alt="linkedin" /></a>
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