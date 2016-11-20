<?php
	include_once "connectdb.php";
	$query="SELECT employees.dental, employees.vision FROM employees";
	$result= mysqli_query($con, $query);

	
	if($result){
		$dental= [];
		$vision= [];
		$i=0;
		//this puts the data into arrays
		while ($col = $result->fetch_array(MYSQLI_NUM)){
			array_push($dental, $col[0]);
			array_push($vision, $col[1]);
			$i++;
		}
		$result->close();

		$dentalclaimed = [];
		$dentaltotal = [];
		$visionclaimed = [];
		$visiontotal = [];
		for ($index=0; $index<$i;$index++){
			//first half of string--the total
			array_push($dentaltotal, substr($dental[$index], 0, strpos($dental[$index], " ")));
			//second half of string--the expense
			array_push($dentalclaimed, substr($dental[$index], strpos($dental[$index], " ")+1));
			//first half of string--the total
			array_push($visiontotal, substr($vision[$index], 0, strpos($vision[$index], " ")));
			//second half of string--the expense
			array_push($visionclaimed, substr($vision[$index], strpos($vision[$index], " ")+1));	
		}
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