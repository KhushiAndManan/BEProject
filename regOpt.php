<?php
session_start(); // start session

// check if user is logged in
if(!isset($_SESSION["registrar_id"])) {
    header("Location: login.php"); // redirect to login page if user is not logged in
    exit();
}

// get user information
$registrar_id = $_SESSION["registrar_id"];
$registrar_name = $_SESSION["registrar_name"];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrar options</title>
	<style>
		.box {
			margin: auto;
			margin-top: 200px;
			padding: 20px;
			width: 400px;
			height: 200px;
			background-color: #f2f2f2;
			border: 2px solid #333;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		}
		.button {
			font-size: 24px;
			padding: 10px;
			width: 200px;
			margin: 10px;
			text-align: center;
			background-color: #333;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		.button:hover {
			background-color: #444;
		}
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
    <H1>Hello!</H1>
	<h1>Welcome to the Dashboard, <?php echo $registrar_name; ?>!</h1>
	<p>Your registrar ID is <?php echo $registrar_id; ?>. <br>
	Please choose from the options below</p>
	<button class="back-button" onclick="location.href='logout.php'">Logout</button>
	<div class="box">
		<a onclick="location.href='hospReg.php'"><button class="button">Add Hospital</button></a>
		<a onclick="location.href='registrar.html'"><button class="button">Verify a certificate</button></a>
	</div>
</body>
</html>
