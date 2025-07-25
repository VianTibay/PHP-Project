<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "USER";
// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Process login...
} else {
    echo "Invalid access.";
}
?>
<!DOCTYPE html>
    <h2>Inventory Login</h2>

    <div class="input-group">
      <i class="fa fa-user"></i>
      <input type="text" name="username" placeholder="Username" required />
    </div>

    <div class="input-group">
      <i class="fa fa-lock"></i>
      <input type="password" name="password" placeholder="Password" required />
    </div>

    <button type="submit">Login</button>

    <p>Don't have an account? <a href="./register.php">Register Here</a></p>
  </form>