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

$userID = $_SESSION['user_id'];
$sql = "SELECT * FROM INVENTORY WHERE USER_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Items</title>
    </head>
    <body>
        <h2>Your Invetory</h2>
        <table>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Date Added</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()){ ?>
            <tr>
                <td><?php echo htmlspecialchars($row['ITEM_NAME']);?></td>
                <td><?php echo $row['QUANTITY']; ?></td>
                <td><?php echo $row['DATE_ADDED']; ?></td>
            </tr>
            <?php }?>
        </table>
        <p><a href="dashboard.php">Back to Dashboard</a></p>


    </body>
</html>