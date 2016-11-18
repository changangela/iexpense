<?php
	session_start();
	if(isset($_SESSION['userid'])){
		header("Location: home.php");
	}
	include_once "connectdb.php";
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Welcome | iExpense</title>
			<meta content = "width = device-width, initial-scale = 1.0" name = "viewport">
			<link rel = "stylesheet" href = "vendor/bootstrap/css/bootstrap.min.css" type = "text/css"/>
			<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"/> 
	        <link rel = "stylesheet" href = "css/main.css" type = "text/css"/>
	</head>
	<body>
		<nav class = "navbar navbar-default navbar-fixed-top" role = "navigation">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target = "#navbar">
						<span class = "sr-only">Toggle navigation</span>
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
					</button>
					<a class = "navbar-brand" href = "index.php">iExpense</a>
				</div>

				<div class = "collapse navbar-collapse" id = "navbar">
					<ul class = "nav navbar-nav navbar-right">
						<li><a href = "register.php"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
						<li><a href = "login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class = "jumbotron">
			<div class = "container">
				<div class = "row">
					<div class = "col-md-12">
						<h1 class = "text-center">Welcome to iExpense</h1>
					</div>
				</div>
			</div>
		</div>
		<script src = "vendor/jquery/jquery-3.1.0.min.js"></script>
		<script src = "vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src = "js/main.js"></script>
	</body>
</html>