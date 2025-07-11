<?php
session_start();

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "USER";
// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];    

    // Search in Database
    $sql = "SELECT * FROM USERINFO WHERE USERNAME = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$inputUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check User Existence
    if($result->num_rows === 1){
        $row = $result->fetch_assoc();
        if(password_verify($inputPassword, $row['PASSWORD'])){
            $_SESSION['user_id'] = $row['ID'];
            $_SESSION['username'] = $row['USERNAME'];
            
            header("Location: dashboard.php");
            exit();
        }else{
            echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Registration Result</title>
            <link rel="stylesheet" href="../Assets/css/userRecord.css">
        </head>
        <body>
            <p>Passwords do not match!</p>
            <a href="login.php">Back to Login</a>
        </body>
        </html>';
        }
    }else{
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Registration Result</title>
            <link rel="stylesheet" href="../Assets/css/userRecord.css">
        </head>
        <body>
            <p>Username not Found!</p>
            <a href="login.php">Back to Registration</a>
        </body>
        </html>';
    }

    $stmt->close();
}

$conn->close();
?>
