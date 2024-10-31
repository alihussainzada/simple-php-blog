<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password - KoalaSEC</title>
    <link rel="stylesheet" href="static/forgetpasswordStyles.css">
</head>
<body>

<div class="forgot-password-container">
    <h2>Forgot Password</h2>
    <form action="process_forgot_password.php" method="POST">
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="submit" value="Send Reset Link">
    </form>

    <p>Remembered your password? <a href="login.php">Log In</a></p>
</div>

</body>
</html>
