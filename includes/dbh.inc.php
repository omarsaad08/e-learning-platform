<?php
$dsn = 'mysql:host=localhost;dbname=e_learning_platform';
$dbusername = 'root';
$dbpassword = '01032263033Yy@';

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database conneciton failed :( " . $e->getMessage();
}
