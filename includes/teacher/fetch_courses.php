<?php
if (!isset($pdo)) {
    require '../dbh.inc.php';
}

function getTeacherCourses($teacher_id, $pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM courses WHERE teacher_id = ?");
    $stmt->execute([$teacher_id]);
    return $stmt->fetchAll();
}
