<?php
	include_once "connectdb.php";

	session_start();

	if(!isset($_SESSION['userid'])){
		header("Location: login.php");
	}

	$storeid = $_GET['storeid'];
	$itemlist = $_GET['itemlist'];
	$date = $_GET['date'];

	$query = "INSERT INTO purchases (userid, itemlist, storeid, date) VALUES (" . $_SESSION['userid'].", '" . $itemlist."', ".$storeid.",'". $date ."')" ;
	$result = mysqli_query($con, $query);
	echo $query;
	if($result){
	}else{
		echo "Connection unsuccessful, please try again later.";
	}

?>