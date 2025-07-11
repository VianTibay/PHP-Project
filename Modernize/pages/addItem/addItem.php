<?php
// session_start();
// if (!isset($_SESSION['username'])) {
//     header("Location: login.php"); // Redirect to login
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Item</title>
  <link rel="stylesheet" href="../addItem/asset/css/style.css"/>
  <link rel="stylesheet" href="../Dashboard/asset/css/style.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/your-kit.js" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Toggle Sidebar Button (Desktop Only) -->
  <div class="menu-toggle d-none d-md-block" id="menuToggle"><i class="fas fa-bars"></i></div>

  <!-- Mobile Sidebar Toggle (Visible on Mobile) -->
  <nav class="d-md-none navbar navbar-dark bg-dark px-3">
    <button class="btn btn-outline-info" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
      <i class="fas fa-bars"></i>
    </button>
  </nav>

  <!-- Sidebar (Desktop) -->
  <aside class="sidebar" id="sidebar">
    <h2 id="greetings">Inventory <?php //echo htmlspecialchars($_SESSION['username'])?></h2>

    <ul>
          <li><a href="../profile/profile.php"><i class="fas fa-plus"></i>Profile</a></li>
      <li><a href="../Dashboard/dashboard.php"><i class="fa-solid fa-gauge"></i> DashBoard</a></li>
      <li><a href="../addItem/addItem.php"><i class="fas fa-plus"></i> Add Item</a></li>
      <li><a href="../updateItem/updateItem.php"><i class="fas fa-edit"></i> Update Item</a></li>
      <li><a href="../viewitem/viewItems.php"><i class="fas fa-boxes"></i> View Inventory</a></li>
      <li><a href="../../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
  </aside>



  <div class="container">
    <form action="../saveItem/saveItem.php" method="post" class="item-form">
      <h2><i class="fa-solid fa-box"></i> Add New Item</h2>

      <div class="input-group">
        <label for="itemName">Item Name</label>
        <input type="text" name="itemName" id="itemName" required>
      </div>

      <div class="input-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" required>
      </div>

      <p><a href="../Dashboard/dashboard.php">Back to Dashboard</a></p>

      <button type="submit"><i class="fa-solid fa-paper-plane"></i> Submit</button>
    </form>
  </div>
  <script src="../Dashboard/asset/js/script.js"></script>
  <script src="../../js/script.js"></script>
</body>
</html>
