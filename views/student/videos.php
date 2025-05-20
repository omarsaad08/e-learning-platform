<?php
require_once __DIR__ . '/../../controllers/auth_check.php';
require_once('../../controllers/LessonController.php');
require_once('../../controllers/CourseController.php');
require_once('../../controllers/AuthController.php');
require_once('../../controllers/EnrollmentController.php');

$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

$controller = new LessonController();
$lessons = $controller->fetchCourseLessons($course_id);

$courseController = new CourseController();
$course = $courseController->getCourseById($course_id);
$authController = new AuthController();
$teacher = $authController->getUserById($course['teacher_id']);
$enrollmentController = new EnrollmentsController();
$isEnrolled = $enrollmentController->isEnrolled($course_id, $_SESSION['user_id']);
if (!$isEnrolled) {
  header("Location: ./courses.php?message=You are not enrolled in this course.");
  exit();
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
  <?php include('../components/headImports.php'); ?>
  <title>Videos</title>
  <link rel="stylesheet" href="../../public/css/videos.css" />
</head>

<body>
  <?php include '../components/navbar.php'; ?>

  <div class="container-fluid">
    <div class="row g-0">
      <div class="col-md-3 sidebar">
        <h5 class="mb-4">videos</h5>
        <div id="playlist">
          <?php foreach ($lessons as $index => $lesson): ?>
            <div class="playlist-item <?php echo $index === 0 ? 'playlist-active' : ''; ?>"
              data-video="../../<?php echo $lesson['content']; ?>">
              <?php echo htmlspecialchars($lesson['title']); ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php
      if (empty($lessons)):
        echo '<div class="col-md-9 content-area text-center text-white"><h2>No videos available for this course.</h2></div>';
      else:
      ?>
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
      endif;
      include '../mutual/contact.php';
        ?>
        </div>
    </div>
  </div>

  <?php include '../components/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../public/js/videos.js"></script>
  <script src="../../public/js/forceReload.js"></script>
</body>

</html>