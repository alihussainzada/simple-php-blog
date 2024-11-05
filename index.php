<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KoalaSEC Blog</title>
    <link rel="stylesheet" href="static/indexStyle.css">
</head>
<body>
    <header class="headerClass">
        
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

    <div class="container">
        <header>
        <h1>Welcome to KoalaSEC Weblog  </h1>
            <form class="search-bar" action="search.php" method="GET">
                <input type="text" name="query" placeholder="Search blog posts...">
                <button type="submit">Search</button>
            </form>
        </header>
        <main>
            <div class="post">
                <h2 class="post-title"><a href="view_post.php?id=1">Post Title 1</a></h2>
                <p class="post-excerpt">This is a brief introduction to the post content...</p>
                <a href="view_post.php?id=1" class="read-more">Read more</a>
            </div>
            <div class="post">
                <h2 class="post-title"><a href="view_post.php?id=2">Post Title 2</a></h2>
                <p class="post-excerpt">This is a brief introduction to the post content...</p>
                <a href="view_post.php?id=2" class="read-more">Read more</a>
            </div>
            <!-- Repeat .post for each blog post -->
        </main>
    </div>

    <footer>
        <p>&copy; 2024 Your Blog Title. All rights reserved.</p>
    </footer>
</body>
</html>
