<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login
    exit();
}

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

$itemName = $_POST['itemName'];
$quantity = $_POST['quantity'];
$userID = $_SESSION['user_id'];

// Check for Existing Item
$check = $conn->prepare("SELECT * FROM INVENTORY WHERE USER_ID = ? AND ITEM_NAME = ?");
$check->bind_param("is", $userID, $itemName);
$check->execute();
$checkResult = $check->get_result();

// Update Item
if($checkResult->num_rows > 0){
    $update = "UPDATE INVENTORY SET QUANTITY = ? WHERE USER_ID = ? AND ITEM_NAME = ?";
    $update = $conn->prepare($update);
    $update->bind_param("iis", $quantity, $userID, $itemName);

    if($update->execute()){
    echo "Item Updated Successfuly<br>";
    echo "<a href='viewItems.php'>View Updated Item</a><br>";
    echo "<a href='updateItem.php'>Update More</a><br>";
    echo "<a href='dashboard.php'>Return to Dashboard</a>";
    }else{
    echo "Error: ".$update->error;
    }

    $update->close();
}else{
    echo "Item Does not Exist!<br>";
    echo "<a href='dashboard.php'>Return to Dashboard</a>";
    }

$check->close();
$conn->close();
?>