<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - PurpleBlog</title>
    <link rel="stylesheet" href="static/registerStyles.css">
</head>
<body>

<?php
        $message = ''; 
            require 'db.php';
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = htmlspecialchars(trim($_POST['username']));
                $email = htmlspecialchars(trim($_POST['email']));
                $password = htmlspecialchars(trim($_POST['password']));

                $checkUserName = "SELECT * FROM users WHERE username = '$username'";
                $checkResult1 = $conn->query($checkUserName);
                $checkEmail = "SELECT * FROM users WHERE email = '$email'";
                $checkResult2 = $conn->query($checkEmail);

                if ($checkResult1->num_rows > 0) {
                    $message = "Username already exists. Please choose a different one.";
                
                }elseif ($checkResult2->num_rows > 0) {
                    $message = "Email already exists. Please choose a different one.";
                } else {
                    // Prepare the SQL insert statement
                    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

                    // Execute the query
                    if ($conn->query($sql) === TRUE) {
                        header("Location: login.php?msg= You have registered successfull, please login!");
                        exit(); // Make sure to exit after a header redirect
                    } else {
                        // If there was an error with the query, display the error message
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
    ?>
<div class="signup-container">
    <h2>Sign Up</h2>
    <?php if ($message): ?>
        <div class="alert" style="color: red; margin-bottom: 10px;"><?php echo $message; ?></div>
    <?php endif; ?>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Sign Up">
    </form>
    <p>Already have an account? <a href="login.php">Log In</a></p>
</div>
        
</body>
</html>
