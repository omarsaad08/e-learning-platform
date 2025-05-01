<?php
include('../../controllers/LessonController.php');

// Get course ID from the URL
$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

// Initialize controller and fetch lessons
$controller = new LessonController();
$lessons = $controller->fetchCourseLessons($course_id);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>videos</title>

  <!-- Bootstrap + Fonts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../../public/css/videos.css" />
</head>

<body>
  <?php include '../components/navbar.php'; ?>

  <div class="container-fluid">
    <div class="row g-0">
      <!-- Sidebar -->
      <div class="col-md-3 sidebar">
        <h5 class="mb-4">Lessons</h5>
        <div id="playlist">
          <?php foreach ($lessons as $index => $lesson): ?>
            <div class="playlist-item <?php echo $index === 0 ? 'playlist-active' : ''; ?>" 
                 data-video="<?php echo $lesson['video_url']; ?>">
              <?php echo $lesson['title']; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Content Area -->
      <div class="col-md-9 content-area text-center">
        <div class="video-player">
          <iframe id="mainVideo" src="<?php echo $lessons[0]['video_url']; ?>" allowfullscreen></iframe>
        </div>

        <div class="buttons">
          <button class="btn" id="prev-btn">NEXT</button>
          <button class="btn" id="mark-complete-btn">COMPLETE</button>
          <button class="btn" id="next-btn">PREVIOUS</button>
        </div>
      </div>
    </div>
  </div>

  <?php include '../components/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script src="../../public/js/videos.js"></script>
</body>
</html>
