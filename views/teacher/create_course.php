<?php
require_once '../../controllers/CourseController.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

  <?php include('../components/navbar.php'); ?>

  <div class="container mt-5">


    <div class="course-form-box mt-4">
      <div class="createCourseName">
        <h1>Write Your Course</h1>
      </div>
      <form method="POST" action="" enctype="multipart/form-data" id="courseForm">
        <div class="mb-3">
          <input type="text" name="title" id="title" class="form-control" placeholder="Enter course name" required />
        </div>

        <div class="mb-3">
          <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter course description" required></textarea>
        </div>

        <div class="mb-3">
          <input type="text" name="category" id="category" class="form-control" placeholder="e.g., Programming, Design" required />
        </div>

        <div class="mb-3">
          <select name="level" id="level" class="form-control" required>
            <option value="" disabled selected>Select level</option>
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Advanced">Advanced</option>
          </select>
        </div>

        <div class="mb-3">
          <input type="file" name="thumbnail" id="thumbnail" class="form-control" accept="image/*" required />
          <img id="previewImage" class="mt-3 img-thumbnail" style="max-height: 200px; display: none;" />
        </div>

        <input type="submit" class="btn btn-primary">Create Course</input>
      </form>
    </div>
  </div>

  <?php include('../components/footer.php'); ?>
  <script src="../../public/js/course.js"></script>
</body>

</html>