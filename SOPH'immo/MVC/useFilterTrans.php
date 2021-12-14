<?php

	
	session_start();
	$c = mysqli_connect("localhost", "l2", "L2", "CMIndustries");
	mysqli_set_charset($c, "utf8");	
	
	$sql = "SELECT * FROM `location_vente` WHERE location = 0";
	
	$condition = " AND ";
	if (isset ($_POST)) {
		//echo $_POST['price'];
		if ($_POST['price'] != ""){
			if ($_POST['price'] == 500) $sql = $sql.$condition."price"." < ".$_POST['price'];
					else if ($_POST['price'] == 800) $sql = $sql.$condition."price"." < ".$_POST['price']." AND "."price > 500";
					else $sql = $sql.$condition."price"." >= ".$_POST['price'];
		}
		foreach ($_POST as $key => $value) {
			/*if ($value != "" and $key != "action") {
				$sql = $sql.$condition.$key." = ".$value;
			}*/
			$condition = " AND ";
		}
		
		// Filtre Localisation
		if ($_POST['localisation'] != ""){
			$sql = $sql." AND localisation = '".$_POST['localisation']."'";
		}

		// Filtre Surface
		if ($_POST['surface'] != ""){
			if ($_POST['surface'] == "petit") $sql = $sql." AND surface < 20";
			else if ($_POST['surface'] == "normal") $sql = $sql." AND surface >= 20 AND surface < 50";
			else if ($_POST['surface'] == "grand")$sql = $sql." AND surface >= 50";
		}
	}
	//var_dump($sql);
	$result=mysqli_query($c,$sql);
	while($row = mysqli_fetch_assoc($result))
		$list[] = $row;
	if (isset($list)){
		$_SESSION['requetefiltre'] = $list;
	} else {
		$_SESSION['requetefiltre'] = [];
	}

	$adresse = $_SERVER['REQUEST_URI'];
	$script_courant = basename($_SERVER["SCRIPT_FILENAME"], '.php') . ".php";
	$morceau_a_remplacer = "MVC/" . $script_courant;
	$a_remplacer_par = "?page=transaction";
	$resultat = str_replace($morceau_a_remplacer, $a_remplacer_par, $adresse);
	header("location:" . $resultat);
?>