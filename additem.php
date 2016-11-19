<?php
	include_once "connectdb.php";

	session_start();

	if(!isset($_SESSION['userid'])){
		header("Location: login.php");
	}

	$name = $_GET['name'];
	$image = $_GET['image'];
	$price = $_GET['price'];

	$query = "INSERT INTO items (name, image, price) VALUES ('" . $name."', '".$image."', ".$price.")" ;
	$result = mysqli_query($con, $query);
	if($result){
	}else{
		echo "Connection unsuccessful, please try again later.";
	}
?>