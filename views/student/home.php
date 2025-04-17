<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
    <?php
    include('../components/navbar.php');
    ?>


    <div class="main" style="background-image: url('../../public/images/home-background.svg');
    background-size: cover;
    background-repeat: no-repeat;">
        <section class="hero">
            <h2>Welcome to MyCourses</h2>
            <p>Learn, explore, and grow your skills in tech!</p>
        </section>


        <section class="cards">
            <div class="card">
                <h3>HTML Basics</h3>
                <img src="../../public/images/html.jpg">
                <p>Start with the structure of web development.</p>
            </div>
            <div class="card">
                <h3>CSS Styling</h3>
                <img src="../../public/images/css.jpg">
                <p>Learn how to style beautiful and responsive pages.</p>
            </div>
            <div class="card">
                <h3>JavaScript Intro</h3>
                <img src="../../public/images/js.jpg">
                <p>Bring your websites to life with interactivity.</p>
            </div>
        </section>
    </div>
    <?php
    include('../components/footer.php');
    ?>
</body>

</html>