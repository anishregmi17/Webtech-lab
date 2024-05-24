<?php
// Start session to manage user authentication
session_start();

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
                // Set session variables to mark user as logged in
                $_SESSION['logged_in'] = true;
                $_SESSION['email'] = $email;
                // Display success message
                echo "Login Success";
                echo".<br>Now you can Logout too.<br>";
            } else {
                echo "Incorrect Password";
            }
        }
    } else {
        echo "User Not Found."; // Inform user about login failure
    }

    // Close connection
    $conn->close();
}

// Check if logout button is clicked
if (isset($_GET["logout"]) && $_GET["logout"] == 'true') {
    // Destroy session
    session_destroy();
    // Display logout success message
    echo "Logout Success!";
}
?>

 <!-- Logout Button with Inline CSS -->
<button onclick="confirmLogout()" style="padding: 10px 20px; background-color: #ff0000; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Logout</button>

<script>
function confirmLogout() {
    // Display confirmation dialog
    var confirmLogout = confirm("Are you sure you want to logout?");
    // If user confirms, proceed with logout
    if (confirmLogout) {
        // Redirect user to login.php with logout parameter
        window.location.href = "login.php?logout=true";
    }
}
</script>

