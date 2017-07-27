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

	$query = "UPDATE purchases SET userid = ".$_SESSION['userid']." WHERE id = ".$id."";
	$query .= "UPDATE purchases SET itemlist = '".$itemlist."' WHERE id = ".$id."";
	$query .= "UPDATE purchases SET storeid= ".$storeid." WHERE id = ".$id."";
	$query .= "UPDATE purchases SET date = '".$date."' WHERE id = ".$id."";
	echo $query ;


	if(mysqli_multi_query($con, $query)){
	}else{
		echo mysqli_error();
		echo "Connection unsuccessful, please try again later.";
	}
?>