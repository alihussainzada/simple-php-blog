<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post</title>
    <link rel="stylesheet" href="static/view_post.css">
</head>
<?php     
include 'db.php';  
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
$sql = "SELECT * FROM posts  WHERE id = $id";
$result = $conn->query($sql);                
$row = $result->fetch_assoc();

}
?>


<body>
    <div class="container">
        <div class="post">
            <h1 class="post-title"><?php echo $row['title'];?></h1>
            <p class="post-content">
                <?php echo $row['content'];?>
        </div>
    </div>
</body>
</html>
