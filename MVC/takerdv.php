<?php


	$c = mysqli_connect("localhost", "l2", "L2", "CMIndustries");
	mysqli_set_charset($c, "utf8");	

	var_dump($_POST['info']);
	
	if ($_POST['info'] == '')
		{echo "<p>Merci de saisir un motif de rendez-vous</p>";
	}
	else {
		$sql= "UPDATE rendez_vous SET etat='pris', info='".$_POST['info']."' WHERE idrdv=" .$_POST['horaire'];
		$result=mysqli_query($c,$sql);}

	$adresse = $_SERVER['REQUEST_URI'];
	$script_courant = basename($_SERVER["SCRIPT_FILENAME"], '.php') . ".php";
	$morceau_a_remplacer = "MVC/" . $script_courant;
	$a_remplacer_par = "?page=rendezvous";
	$resultat = str_replace($morceau_a_remplacer, $a_remplacer_par, $adresse);
	header("location:" . $resultat);
?>