<?php
include '../db.php';

$backup_file = $dbname . '_backup_' . date("Y-m-d_H-i-s") . '.sql';

function backupDatabase($username, $password, $dbname, $backup_file)
{
    $command = "mysqldump --user=$username --password=$password $dbname > $backup_file";
    system($command, $output);

    if ($output === 0) {
        // If the backup was successful, force the download
        header('Content-Type: application/sql');
        header('Content-Disposition: attachment; filename="' . $backup_file . '"');
        header('Content-Length: ' . filesize($backup_file));
        readfile($backup_file);

        // // Optionally delete the file after download to keep server clean
        // unlink($backup_file);
    } else {
        echo "Error creating database backup!";
    }
}

// Run the backup function
backupDatabase($username, $password, $dbname, $backup_file);
?>

