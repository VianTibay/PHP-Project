<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Item</title>
  <link rel="stylesheet" href="../Assets/css/addItem.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="container">
    <form action="saveItem.php" method="post" class="item-form">
      <h2><i class="fa-solid fa-box"></i> Add New Item</h2>

      <div class="input-group">
        <label for="itemName">Item Name</label>
        <input type="text" name="itemName" id="itemName" required>
      </div>

      <div class="input-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" required>
      </div>

      <p><a href="dashboard.php">Back to Dashboard</a></p>

      <button type="submit"><i class="fa-solid fa-paper-plane"></i> Submit</button>
    </form>
  </div>
</body>
</html>
