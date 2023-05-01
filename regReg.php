<?php
// Connect to the database
$db = mysqli_connect('localhost', "root","", 'projectphase3');

// Check for form submission
if (isset($_POST['submit'])) {
    // Get the user input
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $registrar_id = mysqli_real_escape_string($db, $_POST['registrar_id']);
    $registrar_name = mysqli_real_escape_string($db, $_POST['registrar_name']);
    $registrar_address = mysqli_real_escape_string($db, $_POST['registrar_address']);
    $taluka = mysqli_real_escape_string($db, $_POST['taluka']);
    $district = mysqli_real_escape_string($db, $_POST['district']);
    $state = mysqli_real_escape_string($db, $_POST['state']);

    // Check if the username is already taken
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Username already taken";
        exit;
    }

    // Insert the user data into the database
    $query = "INSERT INTO users (username, password, email, registrar_id, registrar_name, registrar_address, taluka, district, state) 
              VALUES ('$username', '$password', '$email', '$registrar_id', '$registrar_name', '$registrar_address', '$taluka', '$district', '$state')";
    mysqli_query($db, $query);

    // Redirect to the login page or some other page
    header('Location: thanksReg.html');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar registration</title>
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
    <h1>Registrar registration: </h1>
    <form method="post">
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Registrar ID:</label><br>
        <input type="text" name="registrar_id" required><br>
        <label>Registrar Name:</label><br>
        <input type="text" name="registrar_name" required><br>
        <label>Registrar Address:</label><br>
        <textarea name="registrar_address" required></textarea><br>
        <label>Taluka:</label><br>
        <input type="text" name="taluka" required><br>
        <label>District:</label><br>
        <input type="text" name="district" required><br>
        <label>State:</label><br>
        <input type="text" name="state" required><br>
        <br>
        <input type="submit" name="submit" value="Signup">
        <button class="back-button" onclick="location.href='logout.php'">Logout</button>
    </form>
</body>
</html>
