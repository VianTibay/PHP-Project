<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="stylesheet" href="../Assets/css/register.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>
  <form action="userRecord.php" method="post" class="register-form">
    <h2>Create Account</h2>
    <div class="input-group">
      <i class="fa fa-user"></i>
      <input type="text" id="username" name="username" placeholder="Username" required />
    </div>

    <div class="input-group">
      <i class="fa fa-id-card"></i>
      <input type="text" id="name" name="name" placeholder="Full Name" required />
    </div>

    <div class="input-group">
      <i class="fa fa-envelope"></i>
      <input type="email" id="email" name="email" placeholder="Email Address" required />
    </div>

    <div class="input-group">
      <i class="fa fa-location-dot"></i>
      <input type="text" id="address" name="address" placeholder="Address" required />
    </div>

    <div class="input-group">
      <i class="fa fa-lock"></i>
      <input type="password" id="password" name="password" placeholder="Password" required />
    </div>

    <div class="input-group">
      <i class="fa fa-lock"></i>
      <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required />
    </div>

    <button type="submit">Register</button>

    <p>Already have an account? <a href="./login.php">Login here</a></p>
  </form>
</body>
</html>
