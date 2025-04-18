<?php

function getCourseLessons($course_id, $pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM lessons WHERE course_id = ? ORDER BY position ASC");
    $stmt->execute([$course_id]);
    return $stmt->fetchAll();
}
