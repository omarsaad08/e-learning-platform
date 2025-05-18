<?php
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once "./views/mutual/headImports.php";
  ?>
  <title>404 Page Not Found</title>
  <link rel="stylesheet" href="/e-learning-platform/public/css/error.css" />
</head>

<body>
  <div class="container">
    <h1 class="error-code">404</h1>
    <h2 class="error-text">OPPS! PAGE NOT FOUND</h2>
    <p class="description">
      Sorry, the page you're looking for doesn't exist. If you think something
      is broken, report a problem.
    </p>
    <div class="buttons">
      <button><a href="/e-learning-platform/">RETURN HOME</a></button>
    </div>
  </div>

  <script src="../public/js/error.js"></script>
</body>

</html>