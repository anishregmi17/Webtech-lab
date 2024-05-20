<?php

// Database connection parameters
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'login_system';

// Create connection
$conn = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connection successful!";
}

// Now you can use the $conn variable to perform database operations like querying, updating, etc.
// Remember to close the connection when done:

// mysqli_close($conn);

?>
