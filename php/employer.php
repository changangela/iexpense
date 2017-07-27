<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location: index.php");
	}
	include_once "connectdb.php";

	$employeequery = "SELECT * FROM employees WHERE employerid=" . $_SESSION['userid'];
	$employeeresult= mysqli_query($con, $employeequery);
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Employer | iExpense</title>
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
                    <a class = "navbar-brand" href= "employer.php">
                        iExpense
                    </a>
                </div>

                <div class = "collapse navbar-collapse" id = "navbar">
                    <ul class = "nav navbar-nav navbar-right">
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
				<div class = "col-12-md">
					<h2 class = "text-center page-header">Employee list</h2>

				</div>
			</div>
		</div>
		<div class = "col-md-8 col-md-offset-2">
	        <table class = "table table-hover">
	        	<thead>
	        		<tr>
	        			<th>Employee first name</th>
	        			<th>Employee last name</th>
	        			<th></th>
	        		</tr>
	        		
	        	</thead>
	        	<tbody>
	        		<?php 
	        		while($row = mysqli_fetch_array($employeeresult)){
	        			echo "<tr><td>". $row['first']. "</td><td>". $row['last']. "</td><td>";
	        			?>
	        			<a class = 'btn btn-default view-employee' href = <?php echo "'viewemployee.php?userid=". $row['userid']."'"?>><span class='glyphicon glyphicon-log-in'></span> Check-in
	        			</a>
	        			<?php echo "</td></tr>"; }?>
	        				        		
	        

	        	</tbody>

	        </table>

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