<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	mkdir("../IMAGES/".$_POST['nom']);
	$uploaddir = '../IMAGES/'.$_POST['nom'].'/';
	$uploadfile1 = $uploaddir . basename($_FILES['fichierimage1']['name']);
	move_uploaded_file($_FILES['fichierimage1']['tmp_name'], $uploadfile1);
	$uploadfile2 = $uploaddir . basename($_FILES['fichierimage2']['name']);
	move_uploaded_file($_FILES['fichierimage2']['tmp_name'], $uploadfile2);
	$uploadfile3 = $uploaddir . basename($_FILES['fichierimage3']['name']);
	move_uploaded_file($_FILES['fichierimage3']['tmp_name'], $uploadfile3);

	$estvendu = 0;

	$c = mysqli_connect("localhost", "l2", "L2", "CMIndustries");
	mysqli_set_charset($c, "utf8");	
	$sql= "INSERT INTO location_vente(name, localisation, description, price, energy, greenhouseg, location, type, surface, vendu) VALUES ('".$_POST['nom']."', '".$_POST['localisation']."', '".$_POST['description']."', ".$_POST['prix']." , '".$_POST['energie']."' , '".$_POST['effetserre']."', '".$_POST['location']."','".$_POST['type']."',".$_POST['surface'].",".$estvendu.")";
	$result=mysqli_query($c,$sql);
	



	$adresse = $_SERVER['REQUEST_URI'];
	$script_courant = basename($_SERVER["SCRIPT_FILENAME"], '.php') . ".php";
	$morceau_a_remplacer = "MVC/" . $script_courant;
	if ($_POST['location'] == 1) {
		$a_remplacer_par = "?page=location";
	}
	else {
		$a_remplacer_par = "?page=transaction";
	}
	$resultat = str_replace($morceau_a_remplacer, $a_remplacer_par, $adresse);
	header("location:" . $resultat);

?>