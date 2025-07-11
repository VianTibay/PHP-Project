<?php
/*
session_start();
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "USER";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if($conn->connect_error){
    die("Error: ".$conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login
    exit();
}

$userid = $_SESSION['user_id'];
$sql = "SELECT * FROM USERINFO WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $userid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
*/
// if (!isset($_SESSION['username'])) {
//     header("Location: login.php");
//     exit();
// }

// $userid = $_SESSION['user_id'];
// $sql = "SELECT * FROM USERINFO WHERE ID = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param('i', $userid);
// $stmt->execute();
// $result = $stmt->get_result();
// $row = $result->fetch_assoc();

// $message = "";
// $success = false;

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $currentPassword = $_POST['currentPassword'];
//     $newPassword = $_POST['newPassword'];
//     $confirmNewPassword = $_POST['confirmNewPassword'];

//     if ($newPassword !== $confirmNewPassword) {
//         $message = "Sorry, your new passwords do not match. Please try again.";
//     } else {
//         if (password_verify($currentPassword, $row['PASSWORD'])) {
//             $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
//             $update = "UPDATE USERINFO SET PASSWORD = ? WHERE ID = ?";
//             $stmt = $conn->prepare($update);
//             $stmt->bind_param("si", $newHashedPassword, $userid);
//             if ($stmt->execute()) {
//                 $message = "You have successfully changed your password.";
//                 $success = true;
//             } else {
//                 $message = "Something went wrong while changing the password. Please try again.";
//             }
//         } else {
//             $message = "Your current password is incorrect.";
//         }
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../Dashboard/asset/css/style.css" />
  <link rel="stylesheet" href="../profile/asset/css/profile.css" />


</head>
<body>

  <!-- Sidebar Toggle (Mobile) -->
  <div class="menu-toggle d-md-none" id="menuToggle"><i class="fas fa-bars"></i></div>
  <div class="mobile-overlay" id="mobileOverlay"></div>

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <h2>Inventory</h2>
    <ul>
      <li><a href="../profile/profile.php"><i class="fas fa-plus"></i>Profile</a></li>
      <li><a href="../Dashboard/dashboard.php"><i class="fa-solid fa-gauge"></i> DashBoard</a></li>
      <li><a href="../addItem/addItem.php"><i class="fas fa-plus"></i> Add Item</a></li>
      <li><a href="../updateItem/updateItem.php"><i class="fas fa-edit"></i> Update Item</a></li>
      <li><a href="../viewitem/viewItems.php"><i class="fas fa-boxes"></i> View Inventory</a></li>
      <li><a href="../../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
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
        <li class="nav-item"><a class="nav-link text-white" href="profile.php"><i class="fas fa-user me-2"></i>Profile</a></li>
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

    <h1>Profile</h1>

   <div class="card mt-4 p-4">
  <p><strong>Welcome,</strong> <?php /*echo htmlspecialchars($_SESSION['username']);*/ ?>!</p>
  <p><strong>Name:</strong> <?php /*echo htmlspecialchars($row['NAME']); */?></p>
  <p><strong>Address:</strong> <?php /*echo htmlspecialchars($row['ADDRESS']);*/ ?></p>
  <p><strong>Email:</strong> <?php /*echo htmlspecialchars($row['EMAIL']);*/ ?></p>

  <div class="mt-4">
    <a href="../userchangepass/User_changepass.php" class="btn btn-warning"><i class="fas fa-key"></i> Reset Password</a>
    <a href="../Dashboard/dashboard.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
  </div>
</div>
  </main>
<!-- here is im current using a boostrap here sa iba po kasi ginamit ko -->
  <script src="../Dashboard/asset/js/script.js"></script>
 

</body>
</html>