<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Posts</title>
    <link rel="stylesheet" href="static/postsStyle.css">
    <link rel="stylesheet" href="static/styles.css">
    <script src="static/fuctions.js"></script>

</head>
<?php       
session_start();  
if (isset($_SESSION['is_logged']) === true){ 
include 'db.php';
$message = ''; 

    $sql = "SELECT * FROM posts where user_id = '" . $_SESSION['id'] . "'";
    $result = $conn->query($sql);                
    $rows = $result->fetch_all();


    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
    $sql = "DELETE FROM posts WHERE id = $id";
    $result = $conn->query($sql);
    header("Location: posts.php");
        exit;
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
    <div class="container">
        <h1>Your Posts</h1>
        <div class="posts-list">
    <?php foreach ($rows as $row) { ?>
        <div class="post-item">
            <h2 class="post-title"><?php echo htmlspecialchars($row[2]); ?></h2>
            <div class="post-actions">
                <a href="edit_post.php?id=<?php echo $row[0]; ?>" class="button edit">Edit</a>
                <a href="view_post.php?id=<?php echo $row[0]; ?>" class="button view">View</a>
                <a href="posts.php?id=<?php echo $row[0]; ?>" class="button delete">Delete</a>
            </div>
        </div>
    <?php } ?>
</div>
    </div>
    <?php
    }else{?>
        <script>
    setTimeout(function() {
        window.location.href = 'login.php'; 
    }, 1000);
    </script>

        <?php

    }
    ?>
    <footer>
        <p>&copy; 2024 Your Blog Title. All rights reserved.</p>
    </footer>
</body>
</html>
