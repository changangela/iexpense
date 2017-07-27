<?php
	include_once "connectdb.php";

	session_start();

	if(!isset($_SESSION['userid'])){
		header("Location: login.php");
	}

	$name = $_GET['name'];
	$image = $_GET['image'];
	$price = $_GET['price'];
	$id = $_GET['id'];

	$query = "UPDATE items SET name = '".$name."', image='".$image."' , price=".$price." WHERE id = ".$id." ";
	$result= mysqli_query($con, $query);

	if (result){

	}else{
		echo "failed";
	}
	echo $query;
?>