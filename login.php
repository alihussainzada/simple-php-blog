<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="static/loginStyles.css"> <!-- Link to your CSS file -->
</head>
<body>

    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p class="message">
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
        </p>
    </div>

</body>
</html>
