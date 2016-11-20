<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location: index.php");		
	}

	include_once "connectdb.php";
	
	$query="SELECT itemlist FROM purchases WHERE userid=".$_SESSION['userid'];
	$result= mysqli_query($con, $query);
	
	if($result){
		$technology=0;
		$personal=0;
		$entertainment=0;
		$groceries=0;


		$purchases = [];
		while ($col = $result->fetch_array(MYSQLI_NUM)){

			array_push($purchases, $col[0]);
		}
		$result->close();
		
		for ($i=0; $i<sizeof($purchases); $i++){
			 
			$itemlist= explode(" ", $purchases[$i]);

			for ($j=0; $j<sizeof($itemlist);$j++){
				$query2= "SELECT * FROM items WHERE id=".$itemlist[$j]."";
	
				$itemresult= mysqli_query($con, $query2);
				$itemrow=mysqli_fetch_array($itemresult);


				if (strcmp($itemrow['category'], 'technology')==0){
					$technology+=$itemrow['price'];
				}
				if (strcmp($itemrow['category'], 'personal')==0){
					$personal+=$itemrow['price'];
				}
				if (strcmp($itemrow['category'], 'entertainment')==0){
					$entertainment+=$itemrow['price'];
				}
				if (strcmp($itemrow['category'], 'groceries')==0){
					$groceries+=$itemrow['price'];
				}	
			}
		}
		$totalexpense = $technology+ $personal +$entertainment + $groceries;
		$data = array(
			technology => $technology,
		 	personal => $personal,
		 	entertainment => $entertainment,
		 	groceries => $groceries,
		 	totalexpense => $totalexpense
		 );
		echo json_encode($data);
	}else{
		echo "Connection unsuccessful, please try again later.";
	}
?>
