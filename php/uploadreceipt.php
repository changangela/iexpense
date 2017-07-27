<?php
	session_start();

	// if there is already a session
	if(!isset($_SESSION['userid'])!=""){
		Header("Location: login.php");
	}

	include_once "connectdb.php";

	// check if form is submitted

	if(isset($_GET['storeid'])){
		$query = "INSERT INTO purchases (userid, itemlist, storeid, date) VALUES (" . $_SESSION['userid'].", '" . $_GET['itemlist']."', ".$_GET['storeid'].", CURDATE())" ;
		
		$result = mysqli_query($con, $query);

		if($result){
		}else{
			echo "Connection unsuccessful, please try again later.";
		}
	}else{
		echo "Error. No request found.";
	}

	Header("Location: home.php");
?>