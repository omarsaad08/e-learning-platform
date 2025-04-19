<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>404 Page Not Found</title>
  <link rel="stylesheet" href="../public/css/error.css" />
</head>
<body>
  <div class="container">
    <h1 class="error-code">404</h1>
    <h2 class="error-text">OPPS! PAGE NOT FOUND</h2>
    <p class="description">
      Sorry, the page you're looking for doesn't exist. If you think something is broken, report a problem.
    </p>
    <div class="buttons">
      <button onclick="goHome()"><a href="home.php"></a>RETURN HOME</button>
      <button onclick="reportProblem()">REPORT PROBLEM</button>
    </div>
  </div>

  <script src="../public/js/error.js"></script>
</body>
</html>
