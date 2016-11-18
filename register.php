<?php

	// starts a session, checks if user is signed in
	session_start();

	if(isset($_SESSION['userid'])){
		header("Location: index.php");
	}

	include_once 'connectdb.php';
	
	// set validation error flag as false
	$error = false;

	// check if form is submitted
	if(isset($_POST['signup'])){
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

		// name can contain only alpha characters
		if(!preg_match("/^\w+$/",$username)){
			$error = true;
			$username_error = "Username can contain only alphanumerics and underscores";
		}

		// validates email address
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = true;
			$email_error = "Please enter valid email ID";		
		}

		// checks password is over minimum length requirement
		if(strlen($password)<6){
			$error = true;
			$password_error = "Password must be a minimum of 6 characters";		
		}

		// check if password confirmation matches
		if($password != $cpassword){
			$error = true;
			$cpassword_error = "Password confirmation does not match password";			
		}

		// handles request if no errors were caught
		if(!$error){
			// attempts to insert new user info into database
			// password is passed through a hash function producing a new hash value

			$query = "INSERT INTO users (username, email, password) VALUES('" . $username . "','" . $email . "','" . md5($password) . "')";

			if(mysqli_query($con, $query)){
				$successmsg = "Registration successful. <a href = 'login.php'>Click here to login.</a>";
			}else{
				$errormsg = "Registration unsuccessful. Please try again later.";
			}	
					
		}
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Register | iExpense</title>
		<meta content = "width = device-width, initial-scale = 1.0" name = "viewport">
		<link rel = "stylesheet" href = "vendor/bootstrap/css/bootstrap.min.css" type = "text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"/> 
        <link rel = "stylesheet" href = "css/main.css" type = "text/css"/>
	</head>
	<body>
		<nav class = "navbar navbar-default" role = "navigation">
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
						<li class = "active"><a href = "register.php"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
						<li><a href = "login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- create the sign up form -->
		<div class = "container">
			<div class = "row">
				<div class = "col-md-4 col-md-offset-4 well">
					<form role = "form" action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "post" name = "signupform">
						<fieldset>
							<legend>Sign Up</legend>
							<div class = "form-group">
								<label for = "username">Username</label>
								<input type = "text" name = "username" placeholder="johnsmith" required value="<?php if($error) echo $username;?>" class = "form-control"/>
								<span class = "text-danger"><?php if(isset($username_error)) echo $username_error;?></span>
							</div>

							<div class = "form-group">
								<label for = "email">Email</label>
								<input type = "text" name = "email" placeholder = "johnsmith@example.com" required value = "<?php if($error) echo $email; ?>" class = "form-control"/>
								<span class = "text-danger"><?php if(isset($email_error)) echo $email_error;?></span>
							</div>

							<div class = "form-group">
								<label for = "password">Password</label>
								<input type = "password" name = "password" placeholder = "Password" required class = "form-control"/>
								<span class = "text-danger"><?php if(isset($password_error)) echo $password_error; ?></span>
							</div>

							<div class = "form-group">
								<label for="cpassword">Confirm Password</label>
								<input type = "password" name = "cpassword" placeholder = "Confirm Password" required class = "form-control"/>
								<span class = "text-danger"><?php if(isset($cpassword_error)) echo $cpassword_error;?></span>
							</div>

							<div class = "form-group">
								<button type = "submit" name = "signup" class = "btn btn-primary">
									Signup
								</button>
							</div>

						</fieldset>
					</form>

					<span class = "text-success"><?php if(isset($successmsg)) echo $successmsg;?></span>
					<span class = "text-danger"><?php if(isset($errormsg)) echo $errormsg; ?></span>
				</div>
			</div>
		</div>

		<script src = "vendor/jquery/jquery-3.1.0.min.js"></script>
		<script src = "vendor/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>