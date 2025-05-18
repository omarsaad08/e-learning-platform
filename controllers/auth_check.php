<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
require_once 'AuthController.php';
$auth = new AuthController();
if (!$auth->validateJwtAuth() && basename($_SERVER['PHP_SELF']) != 'login.php') {
    header("Location: ../auth/login.php");
    exit;
}
