<?php
// copy to process_login.php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    // Database connection parameters
    $servername = "localhost";
    $db_username = "root"; // Changed variable name to avoid conflict
    $db_password = ""; // Changed variable name to avoid conflict
    $database = "login_system";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve values from the table
    $sql = "SELECT * FROM admins WHERE email='$email'"; 
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            // Access individual columns using array notation
            $email_db = $row['email'];
            $password_db = $row['password'];

            if($email == $email_db && $password == $password_db){
                echo "Login Success";
            }else{
                echo "Incorrect Password";
            }
        }
    } else {
        echo "User Nor Found."; // Inform user about login failure
    }

    // Close connection
    $conn->close();
}
?>