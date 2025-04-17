<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/login.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-box text-white text-center">
            <h2 class="mb-4">Signup</h2>
            <form action="../../includes/auth/signup_handler.php" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="mb-3 text-start">
                    <label for="role" class="form-label">Signup as</label>
                    <select class="form-select" name="role" id="role" required>
                        <option value="">Choose a role</option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <a href="#" class="text-white text-decoration-none">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-light w-100 mb-3">Signup</button>
                <p>Already have an account? <a href="login.php" class="text-white fw-bold">Login</a></p>
            </form>

        </div>
    </div>
</body>

</html>