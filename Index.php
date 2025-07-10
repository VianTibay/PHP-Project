<!DOCTYPE html>
<html>
    <head>
        <title>Inventory Login</title>

    </head>
    <body>
        <form action="userLogin.php" method="post">
            <h2>Login</h2>

            <label for="name">Username:</label>
            <br>
            <input type="text" name="username"><br><br>

            <label for="name">Password:</label>
            <br>
            <input type="password" name="password"><br><br>

            <input type="submit" value="Submit">
        </form>

        <p>Don't have an account? <a href="register.php">Register Here</a></p>
    </body>
</html>