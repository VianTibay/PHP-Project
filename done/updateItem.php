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
  <meta charset="UTF-8" />
  <title>Update Item</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <!-- Bootstrap for mobile sidebar -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <!-- Custom CSS -->
   <link rel="stylesheet" href="../Assets/css/updateItem.css" />
  <link rel="stylesheet" href="../Assets/css/style.css" />
</head>
<body>
  <!-- Mobile Sidebar Toggle -->
  <div class="mobile-overlay" id="mobileOverlay"></div>

  <!-- Sidebar (Desktop) -->
  <aside class="sidebar" id="sidebar">
    <h2>Inventory</h2>
    <ul>
      <li><a href="./addItem.php"><i class="fas fa-plus"></i> Add Item</a></li>
      <li><a href="./updateItem.php"><i class="fas fa-edit"></i> Update Item</a></li>
      <li><a href="./viewItems.php"><i class="fas fa-boxes"></i> View Inventory</a></li>
      <li><a href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
  </aside>

  <!-- Mobile Sidebar (Bootstrap Offcanvas) -->
  <nav class="d-md-none navbar navbar-dark bg-dark px-3">
    <button class="btn btn-outline-info" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
      <i class="fas fa-bars"></i>
    </button>
  </nav>

  <div class="offcanvas offcanvas-start text-bg-dark d-md-none" id="mobileSidebar">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Inventory</h5>
      <button class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link text-white" href="#"><i class="fas fa-plus me-2"></i>Add Item</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i class="fas fa-edit me-2"></i>Update Item</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i class="fas fa-boxes me-2"></i>View Inventory</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
      </ul>
    </div>
  </div>

  <!-- Main Content -->
  <main class="main-content">
    <div class="top-bar">
      <label class="switch">
        <input type="checkbox" id="darkToggle" />
        <span class="slider"></span>
      </label>
    </div>

    <h1>Update Item</h1>

    <div class="update-form-card">
      <form action="saveUpdateItem.php" method="post">
        <div class="input-group">
          <label for="itemName">Item Name:</label>
          <input type="text" id="itemName" name="itemName" required />
        </div>

        <div class="input-group">
          <label for="quantity">Quantity:</label>
          <input type="number" id="quantity" name="quantity" required />
        </div>

        <button type="submit" class="submit-btn"><i class="fas fa-save"></i> Submit</button>
      </form>
    </div>
  </main>

  <!-- Script -->
  <script src="../Assets/js/script.js"></script>
</body>
</html>
