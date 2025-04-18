<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Create Course</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../public/css/course.css">
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

  <!-- Main Content -->
  <div class="container mt-5">
    <!-- Create Course Title -->
    <div class="createCourseName">
      <h2 class="display-4">Create a New Course</h2>
    </div>

    <h3 class="mb-4"></h3>
    
    <form action="../../includes/teacher/course_handler.php" method="POST" enctype="multipart/form-data" id="courseForm">
      <div class="mb-3">
        <label for="title" class="form-label">Course Name</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Enter course name" required />
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter course description" required></textarea>
      </div>

      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <input type="text" name="category" id="category" class="form-control" placeholder="e.g., Programming, Design" required />
      </div>

      <div class="mb-3">
        <label for="level" class="form-label">Level</label>
        <select name="level" id="level" class="form-control" required>
          <option value="" disabled selected>Select level</option>
          <option value="Beginner">Beginner</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Advanced">Advanced</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="thumbnail" class="form-label">Upload Thumbnail</label>
        <input type="file" name="thumbnail" id="thumbnail" class="form-control" accept="image/*" required />
        <img id="previewImage" class="mt-3 img-thumbnail" style="max-height: 200px; display: none;" />
      </div>

      <button type="submit" class="btn btn-primary">Create Course</button>
    </form>
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
          <a href="#"><img src="../../public/images/linkedin_black_logo_icon_147114.png" alt="LinkedIn" /></a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© 2025 MyCourses. All rights reserved.</p>
    </div>
  </footer>

  <script src="script.js"></script>
  <script src="../../public/js/course.js"></script>
</body>

</html>
