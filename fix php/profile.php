<?php
session_start();
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "user_system";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get logged-in user's username
$currentUsername = $_SESSION['username'];

// Fetch user details from DB
$sql = "SELECT ID, USERNAME, EMAIL, ADDRESS, PASSWORD FROM USERINFO WHERE USERNAME = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $currentUsername);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
} else {
    echo "User not found!";
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #f4f4f4;
        }
        .profile {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .profile h2 {
            margin-top: 0;
            color: #333;
        }
        .profile p {
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="profile">
<h2>User Profile</h2>
    <h2>Username: <?php echo htmlspecialchars($row['USERNAME']); ?>!</h2>
    <p><strong>User ID:</strong> <?php echo htmlspecialchars($row['ID']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($row['EMAIL']); ?></p>
    <p><strong>Address:</strong> <?php echo htmlspecialchars($row['ADDRESS']); ?></p>

</div>

</body>
</html>
