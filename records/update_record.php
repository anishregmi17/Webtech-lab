<?php
include 'db.php';

$sql = "UPDATE MyGuests SET lastname='regupdated' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
