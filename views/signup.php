<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-learning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center">
        <div class=" p-4" style="width: 22rem; max-width: 90vw;">
            <h4 class="card-title text-center mb-4">Signup to E-learning</h4>
            <form method="POST" action="includes/authHandler.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm password</label>
                    <input type="confirm-password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Choose user type</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="user-type" value="student" checked>
                        <label class="form-check-label">Student</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="user-type" value="teacher">
                        <label class="form-check-label">Teacher</label>
                        <button type="submit" class="btn btn-primary w-100">Signup</button>
                    </div>
                    <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>
    <script src="public/js/script.js"></script>
</body>

</html>