<?php
session_start();

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "USER";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}

if (!isset($_SESSION['username'])) {
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
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    if ($newPassword !== $confirmNewPassword) {
        $message = "Sorry, your new passwords do not match. Please try again.";
    } else {
        if (password_verify($currentPassword, $row['PASSWORD'])) {
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $update = "UPDATE USERINFO SET PASSWORD = ? WHERE ID = ?";
            $stmt = $conn->prepare($update);
            $stmt->bind_param("si", $newHashedPassword, $userid);
            if ($stmt->execute()) {
                $message = "You have successfully changed your password.";
                $success = true;
            } else {
                $message = "Something went wrong while changing the password. Please try again.";
            }
        } else {
            $message = "Your current password is incorrect.";
        }
    }
}
?>
