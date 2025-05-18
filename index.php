<?php
session_start();
define('BASE_PATH', '/e-learning-platform');
define('VIEWS_PATH', __DIR__ . '/views');

// Get clean request path
$request_path = trim(str_replace(BASE_PATH, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), '/');

// Handle root request
if ($request_path === '' || $request_path === 'index.php') {
    require_once __DIR__ . '/controllers/AuthController.php';
    $auth = new AuthController();

    if ($auth->validateJwtAuth() || isset($_SESSION['user_id'])) {
        $role = $_SESSION['role'] ?? 'student';
        $dashboard = ($role === 'teacher') ? 'teacher/teacher_home.php' : 'student/home.php';
        header("Location: " . BASE_PATH . "/views/$dashboard");
    } else {
        header("Location: " . BASE_PATH . "/views/auth/login.php");
    }
    exit;
}

// Build full file path
$requested_file = VIEWS_PATH . '/' . str_replace('..', '', $request_path); // Basic security

// Check if file exists and is within views directory
$is_valid = file_exists($requested_file) &&
    strpos(realpath($requested_file), realpath(VIEWS_PATH)) === 0 &&
    pathinfo($requested_file, PATHINFO_EXTENSION) === 'php';

if ($is_valid) {
    // Handle authentication for non-auth pages
    if (strpos($request_path, 'auth/') === false) {
        require_once __DIR__ . '/controllers/AuthController.php';
        $auth = new AuthController();

        if (!$auth->validateJwtAuth() && !isset($_SESSION['user_id'])) {
            header("Location: " . BASE_PATH . "/views/auth/login.php");
            exit;
        }
    }

    // Serve the requested view
    require $requested_file;
} else {
    // Show 404 for invalid requests
    header("HTTP/1.0 404 Not Found");
    require VIEWS_PATH . '/mutual/404.php';
}
