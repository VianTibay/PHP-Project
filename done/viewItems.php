<tbody>
  <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
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

    $userID = $_SESSION['user_id'];
    $sql = "SELECT * FROM INVENTORY WHERE USER_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

  ?>
</tbody>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>View Items</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../Assets/css/style.css" />
  <link rel="stylesheet" href="../Assets/css/vw.css" />
</head>
<body>
  <!-- Toggle Sidebar Button (Mobile) -->
  
  <div class="mobile-overlay" id="mobileOverlay"></div>

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <h2>Inventory</h2>
    <ul>
      <li><a href="./addItem.php"><i class="fas fa-plus"></i> Add Item</a></li>
      <li><a href="./updateItem.php"><i class="fas fa-edit"></i> Update Item</a></li>
      <li><a href="./viewItems.php"><i class="fas fa-boxes"></i> View Inventory</a></li>
      <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
  </aside>

  <!-- Mobile Sidebar Offcanvas -->
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
        <li class="nav-item"><a class="nav-link text-white" href="addItem.php"><i class="fas fa-plus me-2"></i>Add Item</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="updateItem.php"><i class="fas fa-edit me-2"></i>Update Item</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="viewItems.php"><i class="fas fa-boxes me-2"></i>View Inventory</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
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

    <h1>Your Inventory</h1>

    <div class="table-responsive mt-4">
      <table class="table table-dark table-bordered table-striped text-center align-middle">
        <thead class="table-light">
          <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Date Added</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo htmlspecialchars($row['ITEM_NAME']); ?></td>
            <td><?php echo $row['QUANTITY']; ?></td>
            <td><?php echo $row['DATE_ADDED']; ?></td>
                <td>
                    <form method="POST" action="deleteItem.php" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    <input type="hidden" name="item_id" value="<?php echo $row['ID']; ?>">
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                  </form>
                </td>
              </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      <a href="dashboard.php" class="btn btn-info"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>
  </main>

  <script src="../Assets/js/script.js"></script>
</body>
</html>
