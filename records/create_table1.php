<?php
include 'db.php';

$sql = "CREATE TABLE pncstudent (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table pncstudent created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
