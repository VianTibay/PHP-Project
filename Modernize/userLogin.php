<?php
session_start();

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "user_system"; // Updated to match the new database name
// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST"){
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
            echo "Invalid Password!";
        }
    }else{
        echo "Username Not Found!";
    }

    $stmt->close();
}

$conn->close();
?>
