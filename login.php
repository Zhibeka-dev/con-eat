<?php
session_start();
$conn = new mysqli("127.0.0.1", "root", "", "usertable");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $_SESSION['user'] = $email;
    header("Location: dashboard.html");
} else {
    echo "Invalid email or password!";
}

$conn->close();
?>
