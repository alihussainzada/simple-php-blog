<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin_panel.css">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
            <li><button onclick="loadContent('admin_posts.php')">View Posts</button></li>
                <li><button onclick="loadContent('admin_users.php')">Manage Users</button></li>
                <li><a href="backups.php">Backup Data</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="content">
            <header>
                <h1>Welcome, Admin</h1>
                <p>Manage posts, users, and backups from this dashboard.</p>
            </header>
            
            <!-- Manage Users Section -->
            <section id="manage-users" class="section">
                <h2>Manage Users</h2>
                <table class="tableClass">
                    <thead>
                      
                        <tr>
                            <td id="contentArea" class=".tdClass"></td>                   
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </section>

        </main>
    </div>
    <script>
    function loadContent(page) {
        fetch(page)
            .then(response => response.text())
            .then(html => {
                document.getElementById('contentArea').innerHTML = html;
            })
            .catch(error => console.error('Error loading page:', error));
    }
</script>
</body>
</html>
