<?php

session_start(); // start session

// check if user is logged in
if(!isset($_SESSION["registrar_id"])) {
    header("Location: reglogin.php"); // redirect to login page if user is not logged in
    exit();
}

// get user information
$registrar_id = $_SESSION["registrar_id"];
$registrar_name = $_SESSION["registrar_name"];

// Connect to the database
$db = mysqli_connect('localhost', "root","", 'projectphase3');

// Check for form submission
if (isset($_POST['submit'])) {
    // Get the user input
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $hospital_id = mysqli_real_escape_string($db, $_POST['hospital_id']);
    $hospital_name = mysqli_real_escape_string($db, $_POST['hospital_name']);
    $hospital_address = mysqli_real_escape_string($db, $_POST['hospital_address']);
    $hospital_phone = mysqli_real_escape_string($db, $_POST['hospital_phone']);
    $taluka = mysqli_real_escape_string($db, $_POST['taluka']);
    $district = mysqli_real_escape_string($db, $_POST['district']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $pin = mysqli_real_escape_string($db, $_POST['pin']);

    // Check if the username is already taken
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Username already taken";
        exit;
    }

    // Insert the user data into the database
    $query = "INSERT INTO hospdeets (username, password, email, hospital_id, hospital_name, hospital_address, hospital_phone, taluka, district, state, pin) 
              VALUES ('$username', '$password', '$email', '$hospital_id', '$hospital_name', '$hospital_address', '$hospital_phone', '$taluka', '$district', '$state', '$pin')";
    mysqli_query($db, $query);

    // Redirect to the login page or some other page
    header('Location: thanksHosp.html');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hospital Registration</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .back-button {
			font-size: 16px;
			padding: 5px;
			background-color: #333;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			position: absolute;
			top: 20px;
			right: 20px;
		}
		.back-button:hover {
			background-color: #444;
		}
	</style>
</head>
<body>
    <h1>Hospital registration: </h1>
    <form method="post">
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Hospital ID:</label><br>
        <input type="text" name="hospital_id" required><br>
        <label>Hospital Name:</label><br>
        <input type="text" name="hospital_name" required><br>
        <label>Hospital Address:</label><br>
        <textarea name="hospital_address" required></textarea><br>
        <label>Phone No: (If landline, type the STD code without 0 and space)</label><br>
        <input type="text" name="hospital_phone" required><br>
        <label>Taluka:</label><br>
        <input type="text" name="taluka" required><br>
        <label>District:</label><br>
        <input type="text" name="district" required><br>
        <label>State:</label><br>
        <input type="text" name="state" required><br>
        <label>Pin code:</label><br>
        <input type="text" name="pin" required><br>
        <br>
        <input type="submit" name="submit" value="Signup">
        <button class="back-button" onclick="location.href='logout.php'">Logout</button>
    </form>
</body>
</html>
