<?php

	mkdir("../IMAGES/".$_POST['nom']);
	$uploaddir = '../IMAGES/'.$_POST['nom'].'/';
	$uploadfile = $uploaddir . basename($_FILES['fichierimage']['name']);
	move_uploaded_file($_FILES['fichierimage']['tmp_name'], $uploadfile);

	$c = mysqli_connect("localhost", "l2", "L2", "CMIndustries");
	mysqli_set_charset($c, "utf8");	
	$sql= "INSERT INTO location_vente(name, localisation, description, price, energy, greenhouseg, location, type, surface) VALUES ('".$_POST['nom']."', '".$_POST['localisation']."', '".$_POST['description']."', ".$_POST['prix']." , '".$_POST['energie']."' , '".$_POST['effetserre']."', '".$_POST['location']."', '".$_POST['type']."', ".$_POST['surface'].")";
	$result=mysqli_query($c,$sql);
	var_dump($sql);
	
	$adresse = $_SERVER['REQUEST_URI'];
	$script_courant = basename($_SERVER["SCRIPT_FILENAME"], '.php') . ".php";
	$morceau_a_remplacer = "MVC/" . $script_courant;
	$a_remplacer_par = "?page=location";
	$resultat = str_replace($morceau_a_remplacer, $a_remplacer_par, $adresse);
	header("location:" . $resultat);
?>
