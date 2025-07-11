<?php
session_start();
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "USER";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if($conn->connect_error){
    die("Error: ".$conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login
    exit();
}

$userid = $_SESSION['user_id'];
$sql = "SELECT * FROM USERINFO WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $userid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
    </head>
    <body>
        <h1>Profile</h1>

        <p style="text-align:right;"><a href="dashboard.php">Back to Dashboard</a></p>
        <p style="text-align:right;"><a href="logout.php">Logout</a></p>
        <p>Welcome, <?php echo $_SESSION['username']; ?>! </p>
        <p>Name: <?php echo $row['NAME']; ?> </p>
        <p>Address: <?php echo $row['ADDRESS']; ?> </p>
        <p>Contact Details:</p>
        <p>Email: <?php echo $row['EMAIL']; ?> </p><br>

        <hr>
        <a href="User_changepass.php">Reset Password</a></p>
        <hr>
    </body>
</html>