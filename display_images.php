<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Replace these database credentials with your actual credentials
$host = "kube-db-do-user-14987761-0.c.db.ondigitalocean.com";
$username = "doadmin";
$password = "AVNS_KWS4DUfpfGlFR_Sb6Xf";
$database = "defaultdb";
$port = 25060;

// Connect to the database
$connection = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve image links from the database
$sql = "SELECT image_link FROM images";
$result = $connection->query($sql);

// Close the database connection
$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
</head>
<body>
    <div class="image-container">
        <?php
        // Display images
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<img src="' . $row['image_link'] . '" alt="Image">';
            }
        } else {
            echo "No images found.";
        }
        ?>
    </div>
</body>
</html>
