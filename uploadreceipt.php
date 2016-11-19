<?php
	session_start();

	// if there is already a session
	if(!isset($_SESSION['userid'])!=""){
		Header("Location: login.php");
	}

	include_once "connectdb.php";

	// check if form is submitted

	if(isset($_GET['storeid'])){
		$url = "addpurchase.php?storeid=" . $_GET['storeid'] . "&itemlist=" . $_GET['itemlist'] . "&date=" . date("y-m-d",time());
		echo $url;
		Header("Location: " . $url);
	}else{
		echo "Error. No request found.";
	}

?>