<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location: index.php");		
	}

	include_once "connectdb.php";
	
	$query="SELECT employees.dental, employees.vision FROM employees WHERE userid=".$_SESSION['userid'];
	$result= mysqli_query($con, $query);
	
	if($result){
		$dental= [];
		$vision= [];
		while ($col = $result->fetch_array(MYSQLI_NUM)){
			array_push($dental, $col[0]);
			array_push($vision, $col[1]);	
		}
		$result->close();
		$dentalclaimed = substr($dental[0], strpos($dental[0], " ")+1);
		$dentaltotal = substr($dental[0], 0, strpos($dental[0], " "));
		$visionclaimed = substr($vision[0], strpos($vision[0], " ")+1);
		$visiontotal = substr($vision[0], 0, strpos($vision[0], " "));
		
		$data = array(
			dentalclaimed => $dentalclaimed,
			dentaltotal => $dentaltotal,
			visionclaimed => $visionclaimed,
			visiontotal => $visiontotal

		);
		echo json_encode($data);
	}else{
		echo "Connection unsuccessful, please try again later.";
	}
?>
