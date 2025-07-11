<?php
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "USER";

	//Variable Mapping
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = $_POST['username'];
        $name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];

        if($password !== $confirm_password){
            die("Passwords do not match!");
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	}
	
	// Create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

    // auto incremented ID
	$sql = "INSERT INTO USERINFO (USERNAME, NAME, EMAIL, ADDRESS, PASSWORD) 
        VALUES ('$username', '$name', '$email', '$address', '$hashedPassword')";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully"."<br>";
        echo "<a href='login.php'>"."Return to Login Page"."</a>";
	} 
	else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>