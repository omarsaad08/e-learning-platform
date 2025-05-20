<?php

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../views/auth/login.php");
    exit();
} else {
    if ($_SESSION['role'] !== 'teacher') {
        header("Location: ../../views/student/home.php");
        exit();
    }
}
