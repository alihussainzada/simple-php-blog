<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Dashboard</title>
    <link rel="stylesheet" href="static/styles.css">
    <link rel="stylesheet" href="static/settings.css">
    <script src="static/fuctions.js"></script>
</head>
<?php       
session_start();   
include 'db.php';
$sql = "SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'";
$result = $conn->query($sql);                
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();  
}
if (isset($_SESSION['is_logged']) === true ){
   
?>

<body>
    <header>
        <h1>Your Dashboard</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Panel</a></li>
                <li><a href="#">Write</a></li>
                <li><a href="#">Posts</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li>(<?php echo $_SESSION['username'] ?>)<a href="#" onclick="deleteAllCookies();redirect('login.php');"> Logout</a></li>

            </ul>
        </nav>
    </header>

    <main class="main">
    <div class="form-container">
        <h2>User Profile</h2>
        <form action="update_profile.php" method="POST">
            <label for="id">ID</label>
            <input type="text" id="id" name="id" value="15" readonly>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="ali" required>

            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="">

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="">

            <label for="bio">Bio</label>
            <textarea id="bio" name="bio"></textarea>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="aliali" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="" required>

            <label for="created_at">Created At</label>
            <input type="text" id="created_at" name="created_at" value="2024-10-31 22:18:05" readonly>

            <label for="token">Token</label>
            <input type="text" id="token" name="token" value="">

            <button type="submit">Update Profile</button>
        </form>
    </div>
    </main>
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