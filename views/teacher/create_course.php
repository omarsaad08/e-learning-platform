<!-- teacher/create_course.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2>Create a New Course</h2>
    <form action="../../includes/teacher/course_handler.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Course Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Course Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" name="category" id="category" class="form-control" required>
            <!-- You could also use a <select> with predefined categories -->
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select name="level" id="level" class="form-control" required>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail Image</label>
            <input type="file" name="thumbnail" id="thumbnail" class="form-control" accept="image/*">
        </div>


        <button type="submit" class="btn btn-primary">Create Course</button>
    </form>
</body>

</html>