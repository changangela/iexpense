<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location: index.php");
	}
	include_once "connectdb.php";
	$query = "SELECT * FROM employees WHERE userid = ". $_SESSION['userid'];
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$dental_total = explode(" ", $row['dental'])[0];
	$dental_claimed = explode(" ", $row['dental'])[1];
	$vision_total = explode(" ", $row['dental'])[0];
	$vision_claimed = explode(" ", $row['vision'])[1];
	echo $d_total;
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Employee Profile | iExpense</title>
			<meta content = "width = device.width , initial-scale = 1.0" name = "viewport">
			<link rel = "stylesheet" href = "vendor/font-awesome/css/font-awesome.min.css"/>
	        <link rel = "stylesheet" href = "vendor/bootstrap/css/bootstrap.min.css" type="text/css"/>
	        <link rel = "stylesheet" href = "vendor/owl-carousel/css/owl.carousel.css" type="text/css"/>
	        <link rel = "stylesheet" href = "vendor/owl-carousel/css/owl.theme.css" type="text/css"/>
	        <link rel = "stylesheet" href = "vendor/owl-carousel/css/owl.transitions.css" type="text/css"/>
	        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"/> 
	        <link rel = "stylesheet" href = "css/main.css" type = "text/css"/>
	</head>
	<body>
		<nav class = "navbar navbar-default" role = "navigation">
            <div class = "container-fluid">
                <div class= " navbar-header">
                    <button type = "button" class = "navbar-toggle" data-toggle ="collapse" data-target = "#navbar">
                        <span class ="sr-only"> Toggle navigation </span>
                        <span class ="icon-bar"></span>
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                    </button>
                    <a class = "navbar-brand" href= "index.php">
                        iExpense
                    </a>
                </div>

                <div class = "collapse navbar-collapse" id = "navbar">
                    <ul class = "nav navbar-nav navbar-right">
						<li>
							<a href = "purchases.php">Purchases</a>
						</li>
						<li>
							<a href = "services.php">Services</a>
						</li>
						<li class = "active">
							<a href = "employeeprofile.php">Employee profile</a>
						</li>
						<li>
							<a href = "transactions.php">Transactions</a>
						</li>
						<li>
							<a href = "wallet.php">Wallet</a>
						</li>
                        <li>
                        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        		<i class="icon-user" aria-hidden="true"></i>
                         		 <?php echo $_SESSION['username'];?>
                         		<span class="caret"></span>
                         	</a>
							<ul class="dropdown-menu">
								<li>
									<a href="logout.php">
										<span class = "glyphicon glyphicon-log-out"></span>
										 Logout
									</a>
								</li>
							</ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class = "container">
        	<div class = "row">
        		<div class = "col-lg-12">
        			<h2 class = "text-center page-header">Employee profile</h2>

        		</div>
        	</div>
        </div>
        <div class = "col-md-10 col-md-offset-1">
	        <table class = "table table-hover">
	        	<thead>
	        		<tr>
	        			<th>Field </th>
	        			<th>Employee data </th>
	        			<th>Claimed </th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<tr>
	        			<td>First name</td>
	        			<td><?php echo $row['first']; ?> </td>
	        			<td>N/A</td>
	        		</tr>
	        		<tr>
	        			<td>Last name </td>
	        			<td><?php echo $row['last']; ?> </td>
	        			<td>N/A</td>
	        		</tr>
	        		<tr>
	        			<td>Employee ID </td>
	        			<td><?php echo $row['id']; ?> </td>
	        			<td>N/A</td>
	        		</tr>
	        		<tr>
	        			<td>Username </td>
	        			<td><?php echo $row['username']; ?> </td>
	        			<td>N/A</td>
	        		</tr>
	        		<tr>
	        			<td>Salary</td>
	        			<td><?php echo "$".$row['salary']; ?> </td>
	        			<td>N/A</td>
	        		</tr>
	        		<tr>
	        			<td>Dental</td>
	          			<td><?php echo "$".$dental_total; ?> </td>
	          			<td><?php echo "$".$dental_claimed; ?> </td>
	           		</tr>
	        		<tr>
	        			<td>Vision</td>
	        			<td><?php echo "$".$vision_total; ?> </td>
	          			<td><?php echo "$".$vision_claimed; ?> </td>
	          			 
	        		</tr>
	        		<tr>
	        			<td>RRSP</td>
	        			<td><?php echo "$".$row['rrsp']; ?> </td>
	        			<td>N/A</td>
	        		</tr>
	        	</tbody>

	        </table>
        </div>
		<script src = "vendor/jquery/jquery-3.1.0.min.js"></script>
		<script src = "vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src = "vendor/owl-carousel/js/owl.carousel.min.js"></script>
		<script src = "js/main.js"></script>

		<script>
			$('.owl-carousel').owlCarousel({
				loop: true,
				items: 4
			});
		</script>
	</body>
</html>