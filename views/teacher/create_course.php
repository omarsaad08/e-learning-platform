<?php
// Include necessary files
require_once  '../../controllers/CourseController.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  require_once '../../controllers/CourseController.php';

  $controller = new CourseController();
  $result = $controller->createCourse(
    $_POST['title'],
    $_POST['description'],
    $_POST['category'],
    $_POST['level'],
    $_FILES['thumbnail']
  );

  if ($result['success']) {
    header("Location: ../../views/teacher/teacher_home.php");
    exit();
  } else {
    echo "Error: " . ($result['error'] ?? 'Could not create course.');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Create Course</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../public/css/course.css" />
</head>

<body>

  <?php
  include('../components/navbar.php');
  ?>


  <!-- Main Content -->
  <div class="container mt-5">

    <!-- Create Course Title -->
    <div class="createCourseName">
      <h2 class="display-4"></h2>
    </div>

    <!-- Course Form Box -->
    <div class="course-form-box mt-4">
      <form method="POST" enctype="multipart/form-data" id="courseForm">
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
  </div>

  <?php
  include('../components/footer.php');
  ?>

  <!-- <script src="script.js"></script> -->
  <!-- <script src="../../public/js/course.js"></script> -->
</body>

</html>