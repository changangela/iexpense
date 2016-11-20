<?php
	include_once "connectdb.php";

	session_start();

	if(!isset($_SESSION['userid'])){
		header("Location: login.php");
	}
	if(isset($_POST['addpurchaseform'])){
		$storeid = mysqli_real_escape_string($con, $_POST['storeid']);
		$itemlist = mysqli_real_escape_string($con, $_POST['itemlist']);
		$date = mysqli_real_escape_string($con, $_POST['date']);
		$query = "INSERT INTO purchases (userid, itemlist, storeid, date) VALUES (" . $_SESSION['userid'].", '" . $itemlist."', ".$storeid.",'". $date ."')" ;
		$result = mysqli_query($con, $query);
		if(!$result){
			echo "Connection unsuccessful, please try again later.";
		}

	}
	$max_items = 50;
	$min_items = 1;
	$error = false;	
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Add Purchase | iExpense</title>
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
        		<div class = "col-md-6 col-md-offset-3 well">
        			<form role = "form" action ="<?php echo $_SERVER['PHP_SELF']; ?>" method ="post" name = "addpurchaseform">
        				<fieldset>
        					<legend>
        						<span class = "glyphicon glyphicon-plus"></span>
        						Add purchase
        					</legend>
        					<div class = "form-group">
	        					<label for = "storename">Store: </label>
	        					<select name = "storename" class = "form-control" >
	        						<option value="" disabled selected hidden> Choose a store </option>
	        							
        							<?php 
        								$storequery = "SELECT * FROM stores";
        								$storeresult = mysqli_query($con, $storequery);
        								while($row = mysqli_fetch_array($storeresult)){
        								echo "<option value = ". $row['id'] . ">". $row['name']. "</option>";
        								}
        							?> 
	        					</select>
	        				</div>
        					
    						<?php for ($i = 0; $i < $max_items ; $i++){?>
        					
        					<div class = "form-group item-hide">
								
								<label for = "item-name"> Item name
								</label>
								<input type = "text" class = "form-control" id = "item-name">
							</div>
							<?php } ?>
							<div type="button" class ="btn btn-success" id = "add-button">
									<i class="icon-plus"></i> Item
								</div>
								<div class = "btn btn-danger" id = "delete-button">
									<i class="icon-minus"></i> Item
								</div>
							<span class = "text-danger text-center pull-right"  id = "max-error"><?php if(isset($itemerror)) echo $itemerror; ?></span>
							<div class = "form-group">
								<button type = "submit" class = "btn btn-default" name = "addpurchase">
									Submit purchase
								</button>
								<a type = "button" href = "addpurchase.php" class = "btn btn-default pull-right">
									Discard purchase
								</a>
							</div>
        				</fieldset>
        			</form>
        		</div>
        	</div>
        </div>


        <script src = "vendor/jquery/jquery-3.1.0.min.js"></script>
		<script src = "vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src = "vendor/owl-carousel/js/owl.carousel.min.js"></script>
		<script src = "js/main.js"></script>

	</body>
</html>