<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_POST['item_id'])) {
    header("Location: viewItems.php");
    exit();
}

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "USER";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$item_id = $_POST['item_id'];
$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM INVENTORY WHERE ID = ? AND USER_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $item_id, $user_id);

if ($stmt->execute()) {
    header("Location: viewItems.php?message=deleted");
    exit();
} else {
    echo "Error deleting item.";
}
?>
