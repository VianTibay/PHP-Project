<?php
// session_start();
// $servername = "localhost";
// $dbusername = "root";
// $dbpassword = "";
// $dbname = "USER";

// $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// if($conn->connect_error){
//     die("Error: ".$conn->connect_error);
// }

// //check user login
// if(!isset($_SESSION['username'])){
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

// //mapping new password vars
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     $userid = $_SESSION['user_id'];
//     $currentPassword = $_POST['currentPassword'];
//     $newPassword = $_POST['newPassword'];
//     $confirmNewPassword = $_POST['confirmNewPassword'];

//     if($newPassword !== $confirmNewPassword){
//         $message = "New Passwords do no match!";
//     }else{
//         if(password_verify($currentPassword, $row['PASSWORD'])){
//             $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
//             $update = "UPDATE USERINFO SET PASSWORD = ? WHERE ID = ?";
//             $stmt = $conn->prepare($update);
//             $stmt->bind_param("si", $newHashedPassword, $userid);
//             if($stmt->execute()){
//                 $message = "Password Changed Successfully!";
//             }else{
//                 $message = "Error in Changing Passwords!";
//             }
//         }else{
//             $message = "Current Password is Incorrect!";
//         }
//     }
// }

if (!empty($message)) {
    echo '<script>';
    echo 'alert("' . addslashes($message) . '");';
    // If you want to redirect on success, you can check for a $success variable
    // if (!empty($success) && $success) {
    //     echo 'window.location.href = "profile.php";';
    // }
    echo '</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Change Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
<!-- custome link for php oop -->
<?php //include './utils/profile1.php'; ?>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../Dashboard/asset/css/style.css" />
</head>
<body>
  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <h2>Inventory</h2>
    <ul>
      <li><a href="../profile/profile.php"><i class="fas fa-plus"></i>Profile</a></li>
      <li><a href="../addItem/addItem.php"><i class="fas fa-plus"></i> Add Item</a></li>
      <li><a href="../updateItem/updateItem.php"><i class="fas fa-edit"></i> Update Item</a></li>
      <li><a href="../viewitem/viewItems.php"><i class="fas fa-boxes"></i> View Inventory</a></li>
      <li><a href="../../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
  </aside>

  <!-- Mobile Sidebar -->
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
        <li class="nav-item"><a class="nav-link text-white" href="addItem.php"><i class="fas fa-plus me-2"></i> Add Item</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="updateItem.php"><i class="fas fa-edit me-2"></i> Update Item</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="viewItems.php"><i class="fas fa-boxes me-2"></i> View Inventory</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="profile.php"><i class="fas fa-user me-2"></i> Profile</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
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

    <h1>Change Password</h1>

    <div class="card p-4 mt-3 shadow-lg">
      <form action="User_changepass.php" method="post">
        <h4 class="mb-4">- Password Reset -</h4>

        <div class="mb-3">
          <label for="currentPassword" class="form-label">Enter Current Password:</label>
          <input type="password" class="form-control" name="currentPassword" id="currentPassword" required>
        </div>

        <div class="mb-3">
          <label for="newPassword" class="form-label">Enter New Password:</label>
          <input type="password" class="form-control" name="newPassword" id="newPassword" required>
        </div>

        <div class="mb-3">
          <label for="confirmNewPassword" class="form-label">Re-Enter New Password:</label>
          <input type="password" class="form-control" name="confirmNewPassword" id="confirmNewPassword" required>
        </div>

        <button type="submit" class="btn btn-warning"><i class="fas fa-key"></i> Submit</button>
        <a href="../profile/profile.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Profile</a>
      </form>
    </div>
  </main>

  <script src="../Dashboard/asset/js/script.js"></script>
</body>
</html>