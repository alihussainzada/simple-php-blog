<?php
// Database credentials
$servername = "localhost"; // Usually "localhost"
$username = "ali";
$password = "ALIali";
$dbname = "koala_blog";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully with MySQLi.";
?>




