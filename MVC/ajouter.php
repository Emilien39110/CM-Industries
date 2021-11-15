<?php
	
	$name= $_POST['nom'];
	$localisation = $_POST['localisation'];
	$description = $_POST['description'];
	$price = $_POST['prix'];
	$energy = $_POST['energie'];
	$greenhouseg = $_POST['effetserre'];
	$location = $_POST['location'];

	$sql= "insert into trail(name, localisation, description, price, energy, greenhouseg, location)
		values (".$name.", ".$description.", ".$description.", ".$price." , ".$energy." , ".$greenhouseg.", ".$location.")";
	mysqli_query($c,$sql);
	header("location: .")
	?>