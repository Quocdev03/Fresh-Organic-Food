<?php
require_once('./config.php');
// Create connection
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
} else {
   echo "Connected successfully";
}
