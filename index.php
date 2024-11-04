<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Blog Title</title>
    <link rel="stylesheet" href="static/styles.css">
</head>
<body>
    <header>
        <h1>Your Blog Title</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="write_post.php ">Write</a></li>
                <li><a href="posts.php">Posts</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li>(<?php echo $_SESSION['username'] ?>)<a href="#" onclick="deleteAllCookies();redirect('login.php');"> Logout</a></li>

            </ul>
        </nav>
    </header>

    <main>
        <article>
            <h2>Blog Post Title</h2>
            <p>Posted on <em>October 31, 2024</em> by <strong>Author Name</strong></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <a href="#">Read more...</a>
        </article>

        <article>
            <h2>Another Blog Post</h2>
            <p>Posted on <em>October 30, 2024</em> by <strong>Author Name</strong></p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <a href="#">Read more...</a>
        </article>
    </main>

    <footer>
        <p>&copy; 2024 Your Blog Title. All rights reserved.</p>
    </footer>
</body>
</html>
