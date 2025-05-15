<?php
include('../../controllers/LessonController.php');
include('../../controllers/CourseController.php');
include('../../controllers/AuthController.php');

$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

$controller = new LessonController();
$lessons = $controller->fetchCourseLessons($course_id);

$courseController = new CourseController();
$course = $courseController->getCourseById($course_id);
$authController = new AuthController();
$teacher = $authController->getUserById($course['teacher_id']);
?>

<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Videos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../../public/css/videos.css" />
</head>

<body>
  <?php include '../components/navbar.php'; ?>

  <div class="container-fluid">
    <div class="row g-0">
      <div class="col-md-3 sidebar">
        <h5 class="mb-4">الدروس</h5>
        <div id="playlist">
          <?php foreach ($lessons as $index => $lesson): ?>
            <div class="playlist-item <?php echo $index === 0 ? 'playlist-active' : ''; ?>"
              data-video="../../<?php echo $lesson['content']; ?>">
              <?php echo htmlspecialchars($lesson['title']); ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="col-md-9 content-area text-center">
        <div class="video-player">
          <video id="mainVideo" src="../../<?php echo $lessons[0]['content']; ?>" controls width="90%"></video>
        </div>
        <div class="buttons mt-3">
          <button class="btn btn-primary" id="prev-btn">Previous</button>
          <button class="btn btn-success" id="mark-complete-btn">Mark Completed</button>
          <button class="btn btn-primary" id="next-btn">Next</button>
        </div>
        <?php
        include '../mutual/contact.php';
        ?>
      </div>
    </div>
  </div>

  <?php include '../components/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../public/js/videos.js"></script>
</body>

</html>