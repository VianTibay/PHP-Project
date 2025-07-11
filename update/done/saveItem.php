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

//Check for Duplicates
$check = $conn->prepare("SELECT * FROM INVENTORY WHERE USER_ID = ? AND ITEM_NAME = ?");
$check->bind_param("is", $userID, $itemName);
$check->execute();
$checkResult = $check->get_result();

if($checkResult->num_rows > 0){
    echo "Item already exists in your inventory!<br>";
    echo "<a href='dashboard.php'>Return to Dashboard</a>";
}else{
    $sql = "INSERT INTO INVENTORY (USER_ID, ITEM_NAME, QUANTITY) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isi", $userID, $itemName, $quantity);

    if($stmt->execute()){
    echo "Item Added Successfuly<br>";
    echo "<a href='addItem.php'>Add More</a><br>";
    echo "<a href='dashboard.php'>Return to Dashboard</a>";
    }else{
    echo "Error: ".$stmt->error;
    }
}
?>

