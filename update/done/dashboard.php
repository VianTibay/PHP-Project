
<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Inventory Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../Assets/css/style.css" />

  <!-- Bootstrap CSS -->
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
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username'])?></h2>
    <ul>
      <li><a href="./profile.php"><i class="fas fa-plus"></i>Profile</a></li>
      <li><a href="./addItem.php"><i class="fas fa-plus"></i> Add Item</a></li>
      <li><a href="./updateItem.php"><i class="fas fa-edit"></i> Update Item</a></li>
      <li><a href="./viewItems.php"><i class="fas fa-boxes"></i> View Inventory</a></li>
      <li><a href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="main-content">
    <!-- Desktop Dark Mode Toggle -->
    <div class="top-bar d-none d-md-flex">
      <label class="switch">
        <input type="checkbox" id="darkToggle" />
        <span class="slider"></span>
      </label>
    </div>

    <h1>Inventory Management Dashboard</h1>
    <h2>Welcome!</h2>

    <div class="realtime-tracker">
      <h3>Real-Time Tracker</h3>
      <p>Tracking status...</p>
    </div>
  </main>

  <!-- Bootstrap Offcanvas Sidebar (Mobile Only) -->
  <div class="offcanvas offcanvas-start text-bg-dark d-md-none" tabindex="-1" id="mobileSidebar">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Inventory</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="nav flex-column mb-4">
        <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fas fa-plus me-2"></i>Add Item</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fas fa-edit me-2"></i>Update Item</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fas fa-boxes me-2"></i>View Inventory</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
      </ul>

      <!-- Mobile Dark Mode Toggle -->
      <div class="form-check form-switch text-white">
        <input class="form-check-input" type="checkbox" role="switch" id="darkToggleMobile">
        <label class="form-check-label" for="darkToggleMobile">Dark Mode</label>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="../Assets/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
