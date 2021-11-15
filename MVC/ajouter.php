<?php

$c = mysqli_connect("localhost", "l2", "L2", "CMIndustries");
mysqli_set_charset($c, "utf8");	

	$name= $_POST['nom'];
	$localisation = $_POST['localisation'];
	$description = $_POST['description'];
	$price = $_POST['prix'];
	$energy = $_POST['energie'];
	$greenhouseg = $_POST['effetserre'];
	$location = $_POST['location'];



	$sql= "INSERT INTO `Location/sell`(`name`, `localisation`, `description`, `price`, `energy`, `greenhouseg`, `location`) VALUES ('".$name."', '".$localisation."', '".$description."', ".$price." , '".$energy."' , '".$greenhouseg."', '".$location."')";
	$result=mysqli_query($c,$sql);
	header("location: ../../PAGES/location.php");
	?>