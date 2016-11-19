<?php
	session_start();

	// if there is already a session
	if(!isset($_SESSION['userid'])!=""){
		Location("login.php");
	}

	include_once "connectdb.php";

	// check if form is submitted

	echo "hiiii";
	// if(isset($_GET['storeid'])){
	// 	echo $_GET['storeid'];
	// }
?>