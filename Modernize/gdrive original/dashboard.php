<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>

    <p><a href="addItem.php">Add New Item</a></p>
    <p><a href="updateItem.php">Update Item</a></p>
    <p><a href="viewItems.php">View Inventory</a></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
