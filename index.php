
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
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
			<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
			<!--
			<link rel = "stylesheet" href = "vendor/bootstrap/css/bootstrap.min.css" type = "text/css"/>
			<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"/> 
	        <link rel = "stylesheet" href = "css/main.css" type = "text/css"/>-->
			<style>
			h3{
				text-align: center;
			}
			.infop{
				text-align: justify;
				line-height: 2;
			}
			html, body{
				font-family: 'Ubuntu', sans-serif;
			}
			.jumbotron{
				margin:0;
			}
			#white-text{
				color:#f0f0f5;
			}
			</style>
	</head>
	<body>
		<!--NAVBAR-->
		<nav class = "navbar navbar-default navbar-fixed-top" role = "navigation">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target = "#navbar">
						<span class = "sr-only">Toggle navigation</span>
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
					</button>
					<a class = "navbar-brand" href = "index.html">iExpense</a>
				</div>

				<div class = "collapse navbar-collapse" id = "navbar">
					<ul class = "nav navbar-nav navbar-right">
						<li><a href = "register.php"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
						<li><a href = "login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class = "jumbotron" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('img/img1.jpg'); background-repeat: no-repeat; background-size: cover; height:100vh;">
			<div class = "container">
				<div class = "row">
					<div class = "col-md-12" style="padding-top:25vh">
						<h1 class = "text-center" id="white-text"><b>Welcome to iExpense</b></h1>
					</div>
				</div>
			</div>
		</div>
		<!--CONTENT-->
		<div class="jumbotron" style="background-image: linear-gradient(rgba(255, 255, 255, 1), rgba(255,255,255, 0.6)), url('img/benefits.jpeg'); background-repeat: no-repeat; background-size: cover;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3>Benefits</h3>
						<p class="infop" style="font-size:1.75rem">iExpense is an online receipt manager that keeps track of all employees’ company-related expenditures in one single space. It allows employees to record all their expenses under unique accounts and acts as an efficient means for companies to reimburse business trips and employee benefits.  Management can also use this timely receipt tracker to control budgets and perform internal audits more effectively. With all the company’s employee transactions available in this webapp, companies will be able to decrease cash fraud.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="jumbotron" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('img/description.jpeg'); background-repeat: no-repeat; background-size: cover;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 id="white-text">Description</h3>
						<p class="infop" id="white-text" style="font-size:1.75rem"> iExpense incorporates the technology of NFC tags, QR codes and company databases to track employee expenses. Once a purchase is made, NFC allows the virtual receipt to be transferred to devices with a NFC reader through a link. This link leads users to the iExpense webapp, where login information is entered. After login credentials are validated, the purchase receipt is recorded on the individual employee’s account. Each unique link can only be uploaded once onto an account, therefore preventing duplication. Employees can also check their history of transactions when they are logged on their personal accounts. That being said, management can access employees’ accounts as well to view their transactions. Devices without a NFC reader would go through a similar process by scanning a QR code or through an URL.</p>
						<p class="infop"  id="white-text" style="font-size:1.75rem">iExpense is currently under beta-testing but will be released shortly to companies. For interest in or inquiries on our webapp, please refer to the contact information at the bottom of the page.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="jumbotron" style="background-image: linear-gradient(rgba(255, 255, 255, 1), rgba(255,255,255, 0.6)), url('img/security.jpg'); background-repeat: no-repeat; background-size: cover;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3>Modern Security</h3>
						<p class="infop" style="font-size:1.75rem">Security and authenticity is taken very seriously by iExpense. To prevent tampering with expense entries, employees are unable to edit their transactions. In other words, employees are not allowed to add purchases or edit the amount spent. Only transactions and amounts that have occurred in real life can be recorded through the uniquely generated URL in a purchase. This increases the authenticity of the numbers on employees’ receipts and benefits the company greatly through more accurate reimbursements and internal auditing</p>
					</div>
				</div>
			</div>
		</div>
		<div class="jumbotron" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0,0,0, 0.6)), url('img/features.jpg'); background-repeat: no-repeat; background-size: cover; ">
				<div class="container">
					<div class="row">
					<div class="col-md-2">&nbsp;</div>
					<div class="col-md-8">
						<h3 id="white-text">Features</h3>
						<p class="infop"">
							<ul id="white-text" style="font-size:1.75rem; line-height: 2">
							<li>Secure transfer of receipt to database through NFC, QR code or URL</li>
							<li>History of receipts separated by purchases and services</li>
							<li>Easy-access for managers to all employee accounts</li>
							<li>Authenticity of company-related receipts</li>
							<li>Reliable database that retrieves desired purchases</li>
							</ul>
						</p>
					</div>
					<div class="col-md-2">&nbsp;</div>
					</div>
				</div>
		</div>
		<!-- FOOTER-->
		<div align="center" class="panel-footer col-md-12 col-xs-12">
            <p ><b>iExpense</b><br>
            2200 University Ave W, Waterloo, ON N2L 3G1<br>
            (519)130-9370&nbsp;&nbsp;&nbsp;<a href="mailto:iexpense@xpense.ca">iexpense@xpense.ca</a><br>
            Copyright &copy; iExpense</p>
        </div>
        <!--SCRIPT-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script>
			$('.navbar').aff
		</script>
	</body>
</html>