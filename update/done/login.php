<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../Assets/css/login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
        <title>Inventory Login</title>
    </head>
    <body>
<form action="userLogin.php" method="post">
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
</body>
</html>