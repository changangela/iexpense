<?php
	session_start();

	include_once "connectdb.php";

	ini_set("allow_url_fopen", 1); //so that i can use an url with file_get_contents
	//this gets the json file from the url
	$inputnum= $_GET['itemId'];
	$url= 'http://api.walmartlabs.com/v1/items/' . (string) $inputnum . '?format=json&apiKey=gffc3jgda5b3xsd78fu3bhrc';
	$json = file_get_contents($url);
	$obj = json_decode($json);

	$name = substr($obj->name, 0, 30);
	$image = $obj->largeImage;
	$price = $obj->salePrice;
	$categoryPath = $obj->categoryPath;

	//This sorts all Walmart category into the 4 categories used: technology, personal, entertainment, and groceries
	if  ((strpos($categoryPath, 'Grocery'))!==false){
		$category= groceries;
	}
	if  ((strpos($categoryPath, 'Holidays'))!==false){
		$category= personal;
	}
	if  ((strpos($categoryPath, 'Appliances'))!==false){
		$category= technology;
	}
	if  ((strpos($categoryPath, 'Automotive'))!==false){
		$category= technology;
	}
	if  ((strpos($categoryPath, 'Baby'))!==false){
		$category= personal;
	}
	if  ((strpos($categoryPath, 'Clothing'))!==false){
		$category= personal;
	}
	if  ((strpos($categoryPath, 'Electronics'))!==false){
		$category= technology;
	}
	if  ((strpos($categoryPath, 'Furniture'))!==false){
		$category= personal;
	}
	if  ((strpos($categoryPath, 'Health'))!==false){
		$category= personal;
	}
	if  ((strpos($categoryPath, 'Home'))!==false){
		$category= personal;
	}
	if  ((strpos($categoryPath, 'Jewellery'))!==false){
		$category= personal;
	}
	if  ((strpos($categoryPath, 'Movies'))!==false){
		$category= entertainment;
	}
	if  ((strpos($categoryPath, 'Office'))!==false){
		$category= personal;
	}
	if  ((strpos($categoryPath, 'Outdoor'))!==false){
		$category= entertainment;
	}
	if  ((strpos($categoryPath, 'Pantry'))!==false){
		$category= personal;
	}
	if  ((strpos($categoryPath, 'Sports'))!==false){
		$category= entertainment;
	}
	if  ((strpos($categoryPath, 'Toys'))!==false){
		$category= entertainment;
	}
	if  ((strpos($categoryPath, 'Video'))!==false){
		$category= technology;
	}

	$query= "INSERT INTO items (name, image, price, category) VALUES ('".$name."', '".$image."', ".$price.", '".$category."')";
	echo $query;
	$result= mysqli_query($con, $query);
	if($result){
	}else{
		echo "Connection unsuccessful, please try again later.";
	}
	
?>