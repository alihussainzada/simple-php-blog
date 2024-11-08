<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Posts</title>
    <link rel="stylesheet" href="../static/postsStyle.css">
    <script src="../static/fuctions.js"></script>

    </head>
    <?php       
session_start();  
if (isset($_SESSION['is_logged']) === true){ 
include '../db.php';
$message = ''; 

    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);                
    $rows = $result->fetch_all();


    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
    $sql = "DELETE FROM posts WHERE id = $id";
    $result = $conn->query($sql);
    header("Location: index.php");
        exit;
    }
   
?>
    <body>

    <div class="container">
        <h1>All Posts</h1>
        <div class="posts-list">
    <?php foreach ($rows as $row) { ?>
        <div class="post-item">
            <h2 class="post-title"><?php echo htmlspecialchars($row[2]); ?></h2>
            <div class="post-actions">
                <a href="admin_posts.php?id=<?php echo $row[0]; ?>" class="button delete">Delete</a>
            </div>
        </div>
    <?php } ?>
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
        </body>
</html>
