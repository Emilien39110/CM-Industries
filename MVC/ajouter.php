<?php

$c = mysqli_connect("localhost", "l2", "L2", "CMIndustries");
mysqli_set_charset($c, "utf8");	

	$sql= "INSERT INTO `Location/sell`(`name`, `localisation`, `description`, `price`, `energy`, `greenhouseg`, `location`) VALUES ('".$_POST['nom']."', '".$_POST['localisation']."', '".$_POST['description']."', ".$_POST['prix']." , '".$_POST['energie']."' , '".$_POST['effetserre']."', '".$_POST['location']."')";
	$result=mysqli_query($c,$sql);
	header("location: ../../PAGES/location.php");
	?>