<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KoalaSEC Blog</title>
    <link rel="stylesheet" href="static/indexStyle.css">
    <script src="static/fuctions.js"></script>
</head>
<?php     
include 'db.php';  

function authoIdToName($conn,$id){
    $sql = "SELECT * FROM users WHERE id = " . $id;
    $result = $conn->query($sql); 
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['username'];
    } else {
        echo "No user found with ID " . $id;
    }

}




session_start();   
$message = ''; 

    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);                
    $rows = $result->fetch_all();

   

?>
<body>
    <header class="headerClass">
        
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="write_post.php ">Write</a></li>
                <li><a href="posts.php">Posts</a></li>

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
        <?php foreach ($rows as $row) { 
             $content = $row[3];
             $limit = 50;
             $trimmed_content = strlen($content) > $limit ? substr($content, 0, $limit) . "..." : $content;?>
            
            <div class="post">
                <h2 class="post-title"><i><?php echo htmlspecialchars($row[2]); ?></i> On <?php echo htmlspecialchars($row[4]) ?> By <?php echo authoIdToName($conn, $row[1]);?></h2>
                <p class="post-excerpt"><?php echo htmlspecialchars($trimmed_content); ?></p>
                <a href="view_post.php?id=<?php echo $row[0]?>" class="read-more">Read more</a>
            </div>
            <?php } ?>
            <!-- Repeat .post for each blog post -->
        </main>
    </div>

    <footer>
        <p>&copy; 2024 Your Blog Title. All rights reserved.</p>
    </footer>
</body>
</html>
