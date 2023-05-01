<?php
session_start(); // start session

// check if user is already logged in
if(isset($_SESSION["id"])) {
    header("Location: regReg.php"); // redirect to dashboard if user is already logged in
    exit();
}

// check if login form is submitted
if(isset($_POST["submit"])) {

    // get form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // connect to database
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "projectphase3";

    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    // check connection
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // prepare SQL statement
    $stmt = mysqli_prepare($conn, "SELECT * FROM admindeets WHERE username = ? AND password = ?");

    // bind parameters
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    // execute SQL statement
    mysqli_stmt_execute($stmt);

    // get result
    $result = mysqli_stmt_get_result($stmt);

    // check if user exists in database
    if(mysqli_num_rows($result) == 1) {
        // set session variables
        $row = mysqli_fetch_assoc($result);
        $_SESSION["id"] = $row["id"];
        $_SESSION["username"] = $row["username"];

        // redirect to dashboard
        header("Location: regReg.php");
        exit();
    } else {
        // show error message
        $error = "Invalid username or password.";
    }

    // close connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login Page</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
	

    <div class="login-container">
        <form method="post">
            <h1>Admin Login Page</h1>
            <label for="username"><b>Username:</b></label>
            <input type="text" name="username" required>

            <label for="password"><b>Password:</b></label>
            <input type="password" name="password" required>

            <button type="submit" name="submit">Login</button>

            <button class="back-button" onclick="window.history.back()">Go Back</button>
        </form>
    </div>

	<?php if(isset($error)) { echo $error; } ?>
</body>
</html>
