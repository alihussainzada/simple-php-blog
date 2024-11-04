<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="static/create_post.css">
    <link rel="stylesheet" href="static/styles.css">
</head>
<?php       
session_start();   
include 'db.php';
$message = ''; 

    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);                
    $rows = $result->fetch_all();
                      
   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $user_id = $_SESSION['id'];
        $catagory_id = $_POST['category']; 

        $sql = "INSERT INTO posts (title, content, user_id, category_id) VALUES ('$title', '$content', '$user_id','$catagory_id')";
        $result = $conn->query($sql); 
        if ($conn->query($sql) === TRUE) {
            $message = "Your post is created.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>
<body>
<header>
        <h1>Your Dashboard</h1>
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
            <input type="text" id="title" name="title" placeholder="Enter the post title" required>

            <label for="content">Content</label>
            <textarea id="content" name="content" placeholder="Write your post content here..." rows="6" required></textarea>

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
</body>
</html>
