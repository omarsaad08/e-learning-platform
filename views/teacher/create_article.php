<!-- teacher/create_article.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Write Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2>Write a New Article</h2>
    <form action="handle_article.php" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Article Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="6" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Publish Article</button>
    </form>
</body>

</html>