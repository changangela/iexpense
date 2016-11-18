<?php
	session_start();

	if(isset($_SESSION['userid'])){
		session_destroy();
		unset($_SESSION['userid']);
		unset($_SESSION['username']);
		header("Location: index.php");
	}else{
		header("Location: index.php");
	} 
?>