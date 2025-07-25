<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "user_system"; // Updated to match the new database name

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $conn = new mysqli($servername, $dbusername, "", "user_system");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO USERINFO (USERNAME, NAME, EMAIL, ADDRESS, PASSWORD) 
            VALUES ('$username', '$name', '$email', '$address', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully<br>";
        echo "<a href='login.php'>Return to Login Page</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method. Access this page from a form.";
}
?>
