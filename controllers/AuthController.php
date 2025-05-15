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
            return "Invalid email or password.";
        }
    }

    public function signup($name, $email, $password, $role)
    {
        // Check if email is already in use
        $existingUser = $this->userModel->getUserByEmail($email);
        if ($existingUser) {
            return "Email is already in use.";
        }

        // Check if password is weak
        $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
        if (!preg_match($passwordRegex, $password)) {
            return "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userId = $this->userModel->create($name, $email, $hashedPassword, $role);

        if ($userId) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['role']    = $role;

            $this->redirectToDashboard($role);
        } else {
            return "Signup failed.";
        }
    }

    public function logout()
    {
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

    public function uploadProfileImage($userId, $imageFile)
    {
        return $this->userModel->uploadProfileImage($userId, $imageFile);
    }

    public function getProfileImage($userId)
    {
        return $this->userModel->getProfileImage($userId);
    }
}
