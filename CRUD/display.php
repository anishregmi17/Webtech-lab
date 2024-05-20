<?php
// Include the file with database connection details
include('connect.php');

// SQL query to fetch data
$query = "SELECT * FROM admins";

// Execute query
$result = mysqli_query($conn, $query);

// Count the number of records
$num_rows = mysqli_num_rows($result);

if($num_rows > 0) {
    echo "<h2>Records found: " . $num_rows . "</h2>";
    // Output data in a table
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Email</th><th>Password</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["aid"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<h2>Records not found</h2>";
}

// Close connection
mysqli_close($conn);
?>
