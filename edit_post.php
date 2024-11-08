<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="static/create_post.css">
    <link rel="stylesheet" href="static/styles.css">
    <script src="static/fuctions.js"></script>
</head>
<?php       
session_start();   
include 'db.php';
if (isset($_SESSION['is_logged']) === true ){
$message = ''; 


$post_id = (int) $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category'];  // Ensure variable name matches

    $sql = "UPDATE posts SET title = '$title', content = '$content', category_id = '$category_id' WHERE id = '$post_id'";

    if ($conn->query($sql) === TRUE) {
        $message = "You updated the post";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

 
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);                
    $rows = $result->fetch_all();


if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sqlPost = "SELECT * FROM posts  WHERE id = $id";
    $result = $conn->query($sqlPost);                
    $rowPost = $result->fetch_assoc();

}
?>
<body>
<header>
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
    

    <main class="main">
    <div class="container">
        <h2>Create a New Post</h2>
        <?php if ($message): ?>
        <div class="alert" style="color: red; margin-bottom: 10px;"><?php echo $message; ?></div>
    <?php endif; ?>
        <form action="" method="POST">
            <label for="title">Title</label>
            <input type="text" id="title" value=<?php echo $rowPost['title']; ?> name="title" placeholder="Enter the post title" required>

            <label for="content">Content</label>
            <textarea id="content" name="content" placeholder="Write your post content here..." rows="6" required><?php echo $rowPost['content']; ?></textarea>

            <label for="category">Category</label>
            <select id="category" name="category" required>
                <?php
                    foreach ($rows as $row){
                        echo ' <option value="'.$row[0].'">'.$row[1].'</option>';
                    }
                ?>
                
            </select>

            <button type="submit">Create Post</button>
        </form>
    </div>
    </main>
    <footer>
        <p>&copy; 2024 Your Blog Title. All rights reserved.</p>
    </footer>
    <?php } else{?>
        <script>
    setTimeout(function() {
        window.location.href = 'login.php'; 
    }, 1000);
    </script>

        <?php

    }?>
</body>
</html>
