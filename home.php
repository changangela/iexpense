<?php
	session_start();

	if(!isset($_SESSION['userid'])){
		header("Location: index.php");
	}

	include_once "connectdb.php";
	$userquery = "SELECT * FROM users WHERE id = " . $_SESSION['userid'];
	$userresult = mysqli_query($con, $query);

?>

<!DOCTYPE html>

<html>
	<head>
		<title>Home | iExpense</title>
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
							<a href = "myreceipts.php">My receipts</a>
						</li>
						<li>
							<a href = "mywallet.php">My wallet</a>
						</li>
						<li>
							<a href = "mystores.php">My stores</a>
						</li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                         		 <i class = "icon-plus"></i> Add
                         		<span class="caret"></span>
                         	</a>
							<ul class="dropdown-menu">
								<li>
									<a href="addreceipt.php">
										 Add receipt
									</a>
									<a href="addstore.php">
										 Add store
									</a>
									<a href="addtransaction.php">
										 Add transaction
									</a>
								</li>
							</ul>
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
        			<h2 class = "text-center page-header"><?php echo $_SESSION['username']; ?>'s home page
        			</h2>
        			<div class = "panel panel-default">
        				<div class = "panel panel-heading">
        					<h5> Your most recent purchases </h5>
        				</div>
        				<div class = "panel panel-body">
        					<div class = "row">
        						
        						<div class="owl-carousel col-md-12">

        							<?php
        								$recentquery = "SELECT * FROM purchases WHERE userid =". $_SESSION['userid'] . " ORDER BY date DESC";
        								$recentresult =mysqli_query($con, $recentquery);
        								$recentrow = mysqli_fetch_array($recentresult);
        								$recentitems = explode(" ", $recentrow['itemlist']);
        								
        								foreach ($recentitems as &$item){
        									$storequery = "SELECT * FROM items WHERE id =" . $item;
        									$storeresult = mysqli_query($con, $storequery);
        									$storerow = mysqli_fetch_array($storeresult);
        									
									?>
										<div class = "item">
	    									<a class = "thumbnail" name = <?php $storerow['name'] ?> url = <?php echo $storerow['image']; ?> date = <?php echo $storerow['date']; ?> >
	    										<p>Item name: <?php echo $storerow['name']; 
	    										?></p>
	    										
	    										<img src = <?php echo '"'. $storerow['image'].'"'; ?>>

	    										
	    									</a>
	      								</div>
        							<?php }	?>
        								




        						</div>
        					</div>
        				</div>
        			</div>
        		</div>

        	</div>

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