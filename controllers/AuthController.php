<?php
require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private $userModel;
    private $secretKey = "e_learning_platform_web_programming_project_2025_secret_key";
    private $algorithm = 'SHA256';

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->userModel = new User();
    }

    public function login($email, $password, $remember = false)
    {
        if (empty($email) || empty($password)) {
            return "All fields are required.";
        }
        $user = $this->userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            if ($remember) {
                $expireTime = time() + 60 * 60 * 24 * 30; // 30 days
                $payload = [
                    'iss' => 'your-domain.com',
                    'iat' => time(),
                    'exp' => $expireTime,
                    'userId' => $user['id'],
                    'role' => $user['role']
                ];

                $jwt = $this->createJWT($payload);
                setcookie('auth_token', $jwt, $expireTime, '/', '', false, true);
            }

            $this->redirectToDashboard($user['role']);
        } else {
            return "Invalid email or password.";
        }
    }

    public function signup($name, $email, $password, $role)
    {
        if (empty($name) || empty($email) || empty($password) || empty($role)) {
            return "All fields are required.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }
        if (!in_array($role, ['teacher', 'student'])) {
            return "Invalid role.";
        }
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
            $this->login($email, $password);
        } else {
            return "Signup failed.";
        }
    }

    public function logout()
    {
        // Clear session
        session_unset();
        session_destroy();

        // Clear JWT cookie
        setcookie('auth_token', '', time() - 3600, '/');

        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

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
    private function base64UrlEncode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private function base64UrlDecode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }

    private function createJWT($payload)
    {
        $header = json_encode([
            'typ' => 'JWT',
            'alg' => $this->algorithm
        ]);

        $payload = json_encode($payload);

        $base64UrlHeader = $this->base64UrlEncode($header);
        $base64UrlPayload = $this->base64UrlEncode($payload);

        $signature = hash_hmac($this->algorithm, $base64UrlHeader . "." . $base64UrlPayload, $this->secretKey, true);
        $base64UrlSignature = $this->base64UrlEncode($signature);

        return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    }

    private function validateJWT($jwt)
    {
        try {
            // Split the token
            $tokenParts = explode('.', $jwt);
            if (count($tokenParts) !== 3) {
                return false;
            }

            $header = $this->base64UrlDecode($tokenParts[0]);
            $payload = $this->base64UrlDecode($tokenParts[1]);
            $signatureProvided = $tokenParts[2];

            // Check expiration
            $payloadDecoded = json_decode($payload);
            if (isset($payloadDecoded->exp) && $payloadDecoded->exp < time()) {
                return false;
            }

            // Verify signature
            $signature = hash_hmac(
                $this->algorithm,
                $tokenParts[0] . "." . $tokenParts[1],
                $this->secretKey,
                true
            );
            $base64UrlSignature = $this->base64UrlEncode($signature);

            if ($base64UrlSignature !== $signatureProvided) {
                return false;
            }

            return json_decode($payload);
        } catch (Exception $e) {
            return false;
        }
    }
    public function validateJwtAuth()
    {
        // If already logged in via session
        if (!empty($_SESSION['user_id'])) {
            $user = $this->userModel->getUserById($_SESSION['user_id']);
            if ($user && $user['role'] === $_SESSION['role']) {
                return true;
            } else {
                return false;
            }
        }

        // Check for JWT cookie
        if (!empty($_COOKIE['auth_token'])) {
            $decoded = $this->validateJWT($_COOKIE['auth_token']);

            if ($decoded) {
                // Verify user still exists
                $user = $this->userModel->getUserById($decoded->userId);
                if ($user) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    return true;
                }
            }

            // Invalid token - clear the cookie
            setcookie('auth_token', '', time() - 3600, '/');
        }

        return false;
    }
}
