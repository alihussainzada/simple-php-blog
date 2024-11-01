<?php
$message = '';
$token = ''; // Initialize $token to avoid undefined variable error
require 'db.php';

if (isset($_GET['token'])) {
    $token = htmlspecialchars(trim($_GET['token']));

    // Check if the token is valid
    $checkToken = "SELECT * FROM users WHERE token = '$token'";
    $tokenResult = $conn->query($checkToken);

    if ($tokenResult && $tokenResult->num_rows > 0) {
        // Token is valid, proceed to check if it's a POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = htmlspecialchars(trim($_POST['password']));
            $token = htmlspecialchars(trim($_POST['token']));  // Retrieve token from POST

            // Update password
            $updatePassword = "UPDATE users SET password = '$password', token = NULL WHERE token = '$token'";
            if ($conn->query($updatePassword) === TRUE) {
                $message = "Your password has been reset successfully. You can now <a href='login.php'>log in</a>.";
            } else {
                $message = "Error resetting your password.";
            }
        }
    } else {
        $message = "Invalid or expired token.";
    }
} else {
    $message = "No token provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="static/resetPasswordStyle.css">

</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <?php if (!empty($message)) { echo "<p class='message'>$message</p>"; } ?>
        <?php if (!empty($token) && $tokenResult && $tokenResult->num_rows > 0 && empty($message)): ?>
            <form action="" method="post">
                <label for="password">Enter new password:</label>
                <input type="password" id="password" name="password" required>
                <!-- Include the token as a hidden field -->
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <input type="submit" value="Reset Password">
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
