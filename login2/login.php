<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Example credentials
    $username = "admin";
    $password = "password123";

    // Get form data
    $inputUsername = $_POST["username"];
    $inputPassword = $_POST["password"];

    // Check credentials
    if ($inputUsername === $username && $inputPassword === $password) {
        // Set session variables
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $inputUsername;
        // Redirect to welcome page
        header("Location: welcome.php");
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post" action="">
        <h2>Login</h2>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
