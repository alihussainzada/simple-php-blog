<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="static/loginStyles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <?php   $msg = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : ''; ?>
    <div class="login-container">
        <h2>Log In</h2>
        <?php if ($msg): ?>
        <div class="alert" style="color: green; margin-bottom: 10px;"><?php echo $msg; ?></div>
    <?php endif; ?> 
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Log In">
        </form>
        <p>Don't have an account? <a href="register.php">Sign Up</a></p>
    </div>
    <?php
          
               require 'db.php';
                
                // Check if form is submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $username = htmlspecialchars(trim($_POST['username']));
                    $password = htmlspecialchars(trim($_POST['password']));

                    $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
                    $result = $conn->query($sql);                
                    if ($result->num_rows == 1) {
                        $row = $result->fetch_assoc();
                        // print_r($row);
                        // die;
                        setcookie("is_logged", "true", time() + (86400 * 1), "/");
                        setcookie("username", $row['username'], time() + (86400 * 1), "/");
                        setcookie("user_id", $row['id'], time() + (86400 * 1), "/");
                        header("Location: user_panel.php");
                        exit();   
                }
            }

        ?>
</body>
</html>
