<?php
require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->userModel = new User();
    }

    public function login($email, $password)
    {
        $user = $this->userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role']    = $user['role'];

            $this->redirectToDashboard($user['role']);
        } else {
            echo "Invalid email or password.";
        }
    }

    public function signup($name, $email, $password, $role)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userId = $this->userModel->create($name, $email, $hashedPassword, $role);

        if ($userId) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['role']    = $role;

            $this->redirectToDashboard($role);
        } else {
            echo "Signup failed.";
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../views/auth/login.php");
        exit;
    }

    public function getUserById($id)
    {
        return $this->userModel->getUserById($id);
    }

    private function redirectToDashboard($role)
    {
        if ($role === 'teacher') {
            header("Location: ../../views/teacher/teacher_home.php");
        } elseif ($role === 'student') {
            header("Location: ../../views/student/home.php");
        } else {
            echo "Unknown role.";
        }
        exit();
    }
}
