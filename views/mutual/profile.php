<?php
session_start();
require_once '../../controllers/ProfileController.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$profileController = new ProfileController();
$data = $profileController->getUserProfile($_SESSION['user_id']);
$user = $data['user'];
$courses = $data['courses'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/profile.css"> <!-- تم تصحيحه -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <?php
    include '../components/navbar.php';
    ?>
    <div class="container py-5 mt-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <!-- Profile Image and Basic Info -->
                        <div class="text-center mb-4">
                            <form action="../../controllers/upload_profile_image.php" method="POST" enctype="multipart/form-data" class="position-relative">
                                <div class="profile-image-container mb-3">
                                    <img src="../../<?= $user['profile_image'] ?: 'uploads/profile_images/user.png' ?>" alt="Profile" class="rounded-circle" id="profileImage" width="150" height="150">

                                    <label for="imageUpload" class="btn btn-sm btn-primary position-absolute bottom-0 end-0">
                                        <i class="bi bi-camera"></i> Change
                                    </label>
                                    <input type="file" id="imageUpload" name="profile_image" class="d-none" accept="image/*" onchange="this.form.submit()">
                                </div>
                            </form>
                            <div class="username-container">
                                <h2 class="card-title mb-0" id="userName"><?= htmlspecialchars($user['name']) ?></h2>
                                <button class="btn btn-link btn-sm text-decoration-none" id="editNameBtn">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>
                            </div>
                            <p id="userTitle">
                                <?= $user['role'] === 'student' ? 'Student' : 'Instructor' ?>
                            </p>
                        </div>


                        <!-- User Information -->
                        <div class="user-info mt-4">
                            <div class="mb-3">
                                <label>Email</label>
                                <p id="userEmail"><?= htmlspecialchars($user['email']) ?></p>
                            </div>
                            <div class="mb-3">
                                <label>Your Courses</label>
                                <ul id="coursesCompleted">
                                    <?php foreach ($courses as $course): ?>
                                        <li>
                                            <?= htmlspecialchars($course['title']) ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="text-center mt-4">
                            <form action="../../controllers/logout_handler.php" method="POST" style="display: inline;">
                                <button type="submit" class="btn btn-outline-danger">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Change Password -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="password" id="currentPassword" class="form-control mb-2" placeholder="Current Password" />
                    <input type="password" id="newPassword" class="form-control mb-2" placeholder="New Password" />
                    <input type="password" id="confirmPassword" class="form-control mb-2" placeholder="Confirm Password" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="savePasswordBtn">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/js/profile.js"></script>
</body>

</html>