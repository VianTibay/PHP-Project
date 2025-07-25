<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "user_system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare query to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM userinfo WHERE USERNAME = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // ✅ Check using password_verify only
    if (password_verify($password, $user['PASSWORD'])) {
        // Login successful
        $_SESSION['username'] = $user['USERNAME'];
        header("Location: dbord.php");
        exit();
    } else {
        // Wrong password
        echo "<script>alert('❌ Incorrect password'); window.location.href='login.php';</script>";
    }
} else {
    // Username not found
    echo "<script>alert('❌ Username not found'); window.location.href='login.php';</script>";
}

$conn->close();
?>
