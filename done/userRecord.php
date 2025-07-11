<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Registration Result</title>
            <link rel="stylesheet" href="../Assets/css/userRecord.css">
        </head>
        <body>
            <p>Passwords do not match!</p>
            <a href="register.php">Back to Registration</a>
        </body>
        </html>';
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $conn = new mysqli("localhost", "root", "", "user");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // verify for duplication
    $checkUsername = $conn->prepare("SELECT ID FROM USERINFO WHERE USERNAME = ?");
    $checkUsername->bind_param("s", $username);
    $checkUsername->execute();
    $checkUsername->store_result();

    if($checkUsername->num_rows > 0){
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Registration Result</title>
            <link rel="stylesheet" href="../Assets/css/userRecord.css">
        </head>
        <body>
            <p>Username already taken! Please choose a different one.</p>
            <a href="register.php">Back to Registration</a>
        </body>
        </html>';
    }else{
        $sql = "INSERT INTO USERINFO (USERNAME, NAME, EMAIL, ADDRESS, PASSWORD) 
            VALUES ('$username', '$name', '$email', '$address', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Registration Success</title>
                <link rel="stylesheet" href="../Assets/css/userRecord.css">
            </head>
            <body>
                <p>New account created successfully!</p>
                <a href="login.php">Return to Login Page</a>
            </body>
            </html>';
        } else {
        echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Registration Error</title>
                <link rel="stylesheet" href="../Assets/css/userRecord.css">
            </head>
            <body>
                <p>Error: ' . htmlspecialchars($sql->error) . '</p>
                <a href="register.php">Back to Registration</a>
            </body>
            </html>';
        }
    }

    $conn->close();
} else {
    echo "Invalid request method. Access this page from a form.";
}
?>
