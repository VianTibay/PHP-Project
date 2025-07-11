<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Item</title>
    </head>
    <body>
        <h2>Add New Item</h2>
        <form action="saveItem.php" method="post">
            <label>Item Name:</label><br>
            <input type="text" name="itemName" required><br><br>

            <label>Quantity:</label><br>
            <input type="text" name="quantity" required><br><br>

            <input type="submit" value="Submit"><br><br>
        </form>
    </body>
</html>