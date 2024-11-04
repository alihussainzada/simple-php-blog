<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Dashboard</title>
    <!-- <link rel="stylesheet" href="static/styles.css"> -->
    <link rel="stylesheet" href="static/settings.css">
    <script src="static/fuctions.js"></script>
</head>
<?php       
session_start();   
include 'db.php';

if (isset($_SESSION['is_logged']) === true ){
   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // $username = htmlspecialchars(trim($_POST['username']));
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $bio = $_POST['bio'];
        $password = $_POST['password']; 
        print($_SESSION['user_id']) ;


        if ($password === ""){
            $sql = "UPDATE users 
        SET first_name = '$first_name', last_name = '$last_name', bio = '$bio'
        WHERE username = '{$_SESSION['username']}'";

        }else{
            $sql = "UPDATE users 
        SET first_name = '$first_name', last_name = '$last_name', bio = '$bio', password = '$password'
        WHERE username = '{$_SESSION['username']}'";

        }

        try {
            
            $result = $conn->query($sql);
            if ($result === true) {
                $message = "Profile updated successfully!";
            } else {
                $message = "Failed to update profile.";
              
            }
        } catch (mysqli_sql_exception $e) {
            $message = "Error updating profile: " . $e->getMessage();
           
        }

    }

    $sql = "SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'";
    $result = $conn->query($sql);                
    if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

}

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
        <?php if ($message): ?>
        <div class="alert" style="color: red; margin-bottom: 10px;"><?php echo $message; ?></div>
    <?php endif; ?>
        <form action="" method="POST">

            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?php echo $row['username']?>" disabled>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']?>" disabled>

            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name']?>">

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $row['last_name']?>">

            <label for="bio">Bio</label>
            <textarea id="bio" name="bio"><?php echo $row['bio']?></textarea>

            <label for="password">Password</label>
            <input type="password" id="password" name="password">

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