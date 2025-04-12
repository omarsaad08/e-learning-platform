<?php
require_once 'dbh.inc.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $role = $_POST["user-type"];

    $query = "INSERT INTO users(name, password, email, role) VALUES(?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);

    $stmt->execute([$name, $password, $email, $role]);
    $pdo = null;
    $stmt = null;
    header("Location: ../index.php");
    die();
    try {
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}
