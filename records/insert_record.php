<?php
include 'db.php';

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Anish', 'Regmi', 'anishregmi19@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
