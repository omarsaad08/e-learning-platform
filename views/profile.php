<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/profile.css"> <!-- تم تصحيحه -->
</head>
<body>
    <div class="container py-5" >
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow">
                    <div class="card-body">
                        <!-- Profile Image and Basic Info -->
                        <div class="text-center mb-4">
                            <div class="profile-image-container mb-3 position-relative">
                                <img src="https://via.placeholder.com/150" alt="Profile" class="rounded-circle" id="profileImage">
                                <label for="imageUpload" class="btn btn-sm btn-primary position-absolute bottom-0 end-0">
                                    <i class="bi bi-camera"></i> Change
                                </label>
                                <input type="file" id="imageUpload" class="d-none" accept="image/*">
                            </div>
                            <div class="username-container">
                                <h2 class="card-title mb-0" id="userName">Jane Smith</h2>
                                <button class="btn btn-link btn-sm text-decoration-none" id="editNameBtn">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>
                            </div>
                            <p class="text-muted" id="userTitle">Web Development Student</p>
                        </div>

                        <!-- User Information -->
                        <div class="user-info mt-4">
                            <div class="mb-3">
                                <label class="text-muted">Email</label>
                                <p id="userEmail">jane.smith@example.com</p>
                            </div>
                            <div class="mb-3">
                                <label class="text-muted">Your Courses</label>
                                <ul id="coursesCompleted">
                                <li>Html <div class="progress">
    <div class="progress-bar" style="width: 75%"></div>
</div></li>
                                <li>CSS<div class="progress">
    <div class="progress-bar" style="width: 75%"></div>
</div></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="text-center mt-4">
                            <button class="btn btn-primary me-2" id="changePasswordBtn">Change Password</button>
                            <button class="btn btn-outline-danger" id="logoutBtn">Logout</button>
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
    <script src="../public/js/profile.js"></script> <!-- فايل الجافا سكربت الخارجي -->
</body>
</html>
