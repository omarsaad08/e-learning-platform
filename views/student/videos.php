<?php
include('../../controllers/LessonController.php');

// Get course ID from the URL
$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

// Initialize controller and fetch lessons
$controller = new LessonController();
$lessons = $controller->fetchCourseLessons($course_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Courses</title>

  <!-- Fonts + Bootstrap -->
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Roboto&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../public/css/videos.css" />
</head>

<body>
<?php include '../components/navbar.php'; ?>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar Playlist -->
    <div class="col-md-3 sidebar  p-3">
      <h5 class="mb-4">Course Playlist</h5>
      <div id="playlist">
        <?php if (!empty($lessons)): ?>
          <?php foreach ($lessons as $index => $lesson): ?>
            <div class="playlist-item <?php echo $index === 0 ? 'playlist-active' : ''; ?>"
                 data-video="<?php echo htmlspecialchars($lesson['video_url']); ?>">
              <?php echo htmlspecialchars($lesson['title']); ?>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>No lessons available.</p>
        <?php endif; ?>
      </div>
    </div>

    <!-- Video Player + Buttons -->

<!-- Video Player + Buttons -->
 
<div class="col-md-9 col-12 py-4 px-5 position-relative">

      
    <div class="container_buttons">
        <div class="buttons">
          <button class="btn" id="next-btn"><span>Next</span></button>
          <button class="btn" id="mark-complete-btn" >
            <span>Mark As Complete</span>
          </button>
          <button class="btn" id="prev-btn"><span>Previous</span></button>
        </div>
      </div>

      <div class="video-player mb-4" style="aspect-ratio: 16/9;">
        <div id="mainVideo"></div>
      </div>

    </div>
  </div>
</div>
        </div>
<?php include('../components/footer.php'); ?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script src="../../public/js/videos.js"></script>
</body>
</html>
