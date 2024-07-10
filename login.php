<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seven_eleven";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect login data
$email = $_POST['email'];
$password = $_POST['password'];

// Validate and sanitize input data
$email = $conn->real_escape_string($email);

// Check if the email exists and fetch the corresponding password hash and name
$sql = "SELECT id, password, name FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, now verify the password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Password is correct, set session variables
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        header("Location: dashboard.php");
        exit();
    } else {
        // Password is incorrect
        echo "Invalid email or password.";
        header("Location: login.html");
    }
} else {
    // No user found with this email
    echo "Invalid email or password.";
    header("Location: login.html");
}

$conn->close();
?>
