<?php
	session_start();

	if(!isset($_SESSION['userid'])){
		header("Location: index.php");
	}

	include_once "connectdb.php";

	$userquery = "SELECT * FROM users WHERE id = " . $_SESSION['userid'];
	$userresult = mysqli_query($con, $query);
	$purchasequery = "SELECT * FROM purchases WHERE userid =". $_SESSION['userid'] . " ORDER BY date DESC";
	$purchaseresult =  mysqli_query($con, $purchasequery);
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Purchases | iExpense</title>
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
						<li class = "active">
							<a href = "purchases.php">Purchases</a>
						</li>
						<li>
							<a href = "services.php">Services</a>
						</li>
						<li>
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
			<div class ="row" >
				<div class = "col-lg-12">
					<h2 class = "text-center page-header">Purchases </h2>
				</div>
				<div class = "col-md-12">
					<!-- Centered Pills -->
					<ul class="nav nav-pills nav-justified" id = "views" >
						<li id = "all"><a href ="#" class= "" >All</a></li>
						<li id = "groceries"><a href ="#" class= "">Groceries</a></li>
						<li id = "technology"><a href ="#" class= "" >Technology</a></li>
						<li id = "personal"><a href ="#" class= "" >Personal</a></li>
						<li id = "entertainment"><a href ="#" class= "" >Entertainment</a></li>
					</ul>
				</div>

				<div class = "col-lg-12" id = "viewstage">
					<div class = "row"><h4>View: all</h4></div>
					<?php

					while($purchaserow = mysqli_fetch_array($purchaseresult)){
						$purchaseitems = explode(" ",$purchaserow['itemlist']);

						foreach ($purchaseitems as $item){
						$itemquery = "SELECT * FROM items WHERE id = " . $item;
						$itemresult = mysqli_query($con, $itemquery);
						$itemrow = mysqli_fetch_array($itemresult);
						$storequery= "SELECT * FROM stores WHERE id =". $purchaserow['storeid'];
    					$storeresult = mysqli_query($con, $storequery);
    					$storerow=mysqli_fetch_array($storeresult);
					?>						
						
						<div class = "col-lg-3 col-md-3 col-sm-6 col-xs-6 col-eq-height  thumbnail-item">
							<a href = "#item-modal" data-toggle = "modal" class = "thumbnail" name = <?php echo '"'. $itemrow['name'].'"'; ?> price = <?php echo '"'. $itemrow['price'].'"'; ?> category = <?php echo "'" . $itemrow['category'] . "'"; ?> store = <?php echo "'". $storerow['name'] ."'";?> image = <?php echo '"'. $itemrow['image'].'"'; ?> date = <?php echo "'" . $purchaserow['date']."'"; ?> receiptid = <?php echo "'" . $purchaserow['id']."'"; ?> >
								<p><?php echo $itemrow['name']; 
								?></p>
								
								<img src = <?php echo '"'. $itemrow['image'].'"'; ?> >				
							</a>
						</div>
					<?php }} ?>
				</div>
			</div>
		</div>


		<div class="modal fade" id="item-modal" role="dialog">
			<div class = "modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div class = "container-fluid">	
							<div class = "row center">
								<div class = "col-md-6 col-xs-12">
									<img src = "" class = "modal-img center-block"/>
								</div>
								<div class = "col-md-6 col-xs-12 well">
									<div class = "row">
 										<dl>
  											<dt class = "col-xs-6">Store</dt>
  											<dd class = "col-xs-6 item-store"><p> &nbsp; </p></dd>
  											<dt class = "col-xs-6">Price</dt>
  											<dd class = "item-price col-xs-6"><p></p></dd>
  											<dt class = "col-xs-6">Category</dt>
  											<dd class = "col-xs-6 item-category"><p></p></dd>
  											<dt class = "col-xs-6">Location</dt>
  											<dd class = "col-xs-6 item-location"><p></p></dd>
  											<dt class = "col-xs-6">Date</dt>
  											<dd class = "col-xs-6 item-date"><p></p></dd>
										</dl>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a href = "" type = "button" class = "btn btn-primary col-xs-offset-1" id = "download-receipt">
							<span class="glyphicon glyphicon-download-alt"></span> Download Receipt
						</a>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

			$('#all').addClass('active');

		    $('#views li').click(function(){
		        $('#views li').removeClass('active');
		        $(this).addClass('active');

		        var viewValue = this.getAttribute('id');
		        // $('.viewstage h4').text("view: " + viewValue);
				if(viewValue != "new")
				    $('#viewstage h4').text("view: " + viewValue);
				if(viewValue == "all"){
				    $('.thumbnail-item').removeClass("item-hide");
				}
				else if(viewValue == "groceries"){
				    $('.thumbnail-item').addClass("item-hide");
				    $('[category = "groceries"').parent().removeClass("item-hide");
				}else if(viewValue == "technology"){
				    $('.thumbnail-item').addClass("item-hide");
				    $('[category = "technology"').parent().removeClass("item-hide");
				}else if(viewValue == "personal"){
				    $('.thumbnail-item').addClass("item-hide");
					$('[category = "personal"').parent().removeClass("item-hide");
				}else if(viewValue == "entertainment"){
				    $('.thumbnail-item').addClass("item-hide");
				    $('[category = "entertainment"').parent().removeClass("item-hide");
				}
		    });
		</script>
	</body>
</html>