<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require_once  '../../controllers/AuthController.php';
$auth = new AuthController();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = $auth->login($_POST['email'], $_POST['password'], isset($_POST['remember']));
}
session_unset();
session_destroy();
setcookie('auth_token', '', time() - 3600, '/');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include '../components/headImports.php';
    ?>
    <title>Login Form</title>
    <link rel="stylesheet" href="../../public/css/login.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-box text-white text-center">
            <h2 class="mb-4">Login</h2>
            <form action="" method="POST">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <button type="submit" class="btn btn-light w-100 mb-3">Login</button>
                <p>Don't have an account? <a href="signup.php" class="text-white fw-bold">Register</a></p>
                <span class="error <?= isset($response) ? 'd-block' : ''; ?>"><?php echo isset($response) ? $response : ''; ?></span>
            </form>

        </div>
    </div>
</body>

</html>