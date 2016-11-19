<?php
	include_once "connectb.php";

	session_start();

	if(!isset($_SESSION['userid'])){
		header("Location: login.php");
	}

	$storeid = $_GET['storeid'];
	$itemlist = $_GET['itemlist'];
	$date = $_GET['date'];
	$id = $_GET['id'];

	$query = "UPDATE purchases SET userid = " . $_SESSION['userid'].", itemlist = '" . $itemlist."', storeid = ".$storeid.", date = '". $date ."' WHERE id=".$id." ";
	echo $query;
	if(mysqli_query($con, $query)){
	}else{
		echo "Connection unsuccessful, please try again later.";
	}
?>