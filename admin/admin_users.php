<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Users</title>
    <link rel="stylesheet" href="admin_users.css"> 
</head>
<?php       
session_start();  
if (isset($_SESSION['is_logged']) === true){ 
include '../db.php';
$message = ''; 

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);                
    $rows = $result->fetch_all();


    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
    $sql = "DELETE FROM users WHERE id = $id";
    $result = $conn->query($sql);
    header("Location: index.php");
        exit;
    }
   
?>
<body>
    <div class="admin-container">
        <table class="user-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row[1]); ?></</td>
                    <td><?php echo htmlspecialchars($row[6]); ?></td>
                    <td><button class="delete-button"><a href="admin_users.php?id=<?php echo $row[0]; ?>">Delete</a></button></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
        // Placeholder delete function
        function deleteUser() {
            alert("Delete function will be handled by PHP.");
        }
    </script>
    <?php
    }else{?>
        <script>
    setTimeout(function() {
        window.location.href = 'login.php'; 
    }, 1000);
    </script>

        <?php

    } ?>
</body>
</html>
