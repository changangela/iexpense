<?php
	include_once 'connectdb.php';
	session_start();

?>

<html>
	<head>
		<title>
			Register | iExpense
		</title>
		<link href = "vendor/bootstrap/css/bootstrap.min.css" type = "text/css" rel = "stylesheet">
	</head>
	<body>
		<nav class = "navbar navbar-default" role = "navigation"> 
			<div class = "container-fluid">
				<div class = "navbar-header">
					<a href = "index.php" class = "navbar-brand">
						iExpense
					</a>
					<button class = "navbar-toggle" type = "button" data-toggle = "collapse" data-target = "#navbar">
						<span class = "sr-only">Toggle navigation</span>
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
					</button>
				</div>
				<div class = "collapse navbar-collapse" id = "navbar">
					<ul class = "nav navbar-nav navbar-right"> 
						<li>
							<a href = "register.php" class = "active">Sign up</a>
						</li>
						<li>
							<a href = "login.php">Login</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<script src = "vendor/bootstrap/js/bootstrap.min.js"/>
	</body>
</html>
