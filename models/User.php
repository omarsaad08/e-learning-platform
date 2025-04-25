<?php
require_once __DIR__ . '/../core/db.php';


class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getUserById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // returns user row as associative array or false
    }


    public function create($name, $email, $password)
    {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $password]);
    }

    public function update($id, $name, $email)
    {
        $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function uploadProfileImage($userId, $imageFile)
    {
        $imagePath = null;

        if ($imageFile && $imageFile['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../uploads/profile_images/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $ext = pathinfo($imageFile['name'], PATHINFO_EXTENSION);
            $newFilename = uniqid() . '.' . $ext;
            $imagePath = $uploadDir . $newFilename;

            if (move_uploaded_file($imageFile['tmp_name'], $imagePath)) {
                $sql = "UPDATE users SET profile_image = :profile_image WHERE id = :id";
                $stmt = $this->db->prepare($sql);
                $dbImagePath = 'uploads/profile_images/' . $newFilename;
                $stmt->execute([
                    'profile_image' => $dbImagePath,
                    'id' => $userId
                ]);
                return true;
            } else {
                return "Failed to upload image.";
            }
        }
    }

    public function getProfileImage($userId)
    {
        $stmt = $this->db->prepare("SELECT profile_image FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && !empty($result['profile_image'])) {
            return $result['profile_image'];
        }

        return "uploads/profile_images/user.png";
    }
}
