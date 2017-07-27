<?php
	session_start();
	if(!$_SESSION['userid']){
		header("Location: index");
	}

	include_once "connectdb.php";

	$receiptid = $_GET['receiptid'];

	$purchasequery = "SELECT * FROM purchases WHERE id=" . $receiptid;
    $purchaseresult = mysqli_query($con, $purchasequery);
    $purchaserow = mysqli_fetch_array($purchaseresult);

   	$items = explode(" ", $purchaserow['itemlist']);

   	$storeid = $purchaserow['storeid'];
	$storequery= "SELECT * FROM stores WHERE id =". $storeid;
	$storeresult = mysqli_query($con, $storequery);
	$storerow=mysqli_fetch_array($storeresult);

   	$str = "-----------------\n     RECEIPT\n-----------------\nStore: " . $storerow['name'] . "\n";
   	$str = $str . "Date: " . $purchaserow['date'] . "\n-----------------\n";

   	$total = 0.0;
   	foreach($items as $item){
   		$itemquery = "SELECT * FROM items WHERE id =" . $item;
		$itemresult = mysqli_query($con, $itemquery);
		$itemrow = mysqli_fetch_array($itemresult);	
   		$str = $str . $itemrow['name'] . ": $" . $itemrow['price'] . "\n";
   		$total += $itemrow['price'];
   	}

   	$str = $str . "-----------------\nTotal price: $" . $total ."\n-----------------\n";

	header('Content-Disposition: attachment; filename="receipt.txt"');
	header('Content-Type: text/plain'); # Don't use application/force-download - it's not a real MIME type, and the Content-Disposition header is sufficient
	header('Content-Length: ' . strlen($str));
	header('Connection: close');


	echo $str;
?>