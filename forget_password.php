<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password - KoalaSEC</title>
    <link rel="stylesheet" href="static/forgetpasswordStyles.css">
</head>
<body>
<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$baseUrl = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
$resetUrl = $baseUrl . "/reset_password.php";
    $message = ''; 
        require 'db.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = htmlspecialchars(trim($_POST['email']));

            $checkEmail = "SELECT * FROM users WHERE email = '$email'";
            $checkResult = $conn->query($checkEmail);
            
            if ($checkResult->num_rows > 0) {
                $token = bin2hex(random_bytes(16));
                $updateToken = "UPDATE users SET token = '$token' WHERE email = '$email'";
                if ($conn->query($updateToken) === TRUE) {
                    $resetLink = $resetUrl."?token=$token";
                    $message = "here is your token <a href='".$resetLink."'a>click here</a>";
                } else {
                    $message = "An error occured.";
                }
            } else {
                $message = "Email does not exist in our records.";
            }
        }
?>

<div class="forgot-password-container">
<?php if ($message): ?>
        <div class="alert" style="color: red; margin-bottom: 10px;"><?php echo $message; ?></div>
    <?php endif; ?>
    <h2>Forgot Password</h2>
    <form action="forget_password.php" method="POST">
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="submit" value="Send Reset Link">
    </form>

    <p>Remembered your password? <a href="login.php">Log In</a></p>
</div>

</body>
</html>
