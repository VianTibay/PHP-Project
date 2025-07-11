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

//check user login
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$userid = $_SESSION['user_id'];
$sql = "SELECT * FROM USERINFO WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $userid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$message = "";

//mapping new password vars
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $userid = $_SESSION['user_id'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    if($newPassword !== $confirmNewPassword){
        $message = "New Passwords do no match!";
    }else{
        if(password_verify($currentPassword, $row['PASSWORD'])){
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $update = "UPDATE USERINFO SET PASSWORD = ? WHERE ID = ?";
            $stmt = $conn->prepare($update);
            $stmt->bind_param("si", $newHashedPassword, $userid);
            if($stmt->execute()){
                $message = "Password Changed Successfully!";
            }else{
                $message = "Error in Changing Passwords!";
            }
        }else{
            $message = "Current Password is Incorrect!";
        }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profile - Change Password</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Profile</h1>
        <p style="text-align:right;"><a href="profile.php">Back to Profile</a></p>
        <p style="text-align:right;"><a href="logout.php">Logout</a></p>
        <p>Welcome, <?php echo $_SESSION['username']; ?>! </p>
        <p>Name: <?php echo $row['NAME']; ?> </p>
        <p>Address: <?php echo $row['ADDRESS']; ?> </p>
        <p>Contact Details:</p>
        <p>Email: <?php echo $row['EMAIL']; ?> </p><br>
        <hr>

        <?php if(!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="User_changepass.php" method="post">
            <h1>-Password Reset-</h1>
            Enter Current Password: <input type="password" name="currentPassword" id="currentPassword">
            <br>
            Enter New Password:<input type="text" name="newPassword" id="newPassword">
            <br>
            Re-Enter New Password:<input type="text" name="confirmNewPassword" id="confirmNewPassword">
            <input type="submit" value="Submit">
        </form>
    </body>
</html>