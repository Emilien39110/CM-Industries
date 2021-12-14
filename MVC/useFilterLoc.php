<?php

	
	session_start();
	$c = mysqli_connect("localhost", "l2", "L2", "CMIndustries");
	mysqli_set_charset($c, "utf8");	
	
	$sql = "SELECT * FROM `location_vente` WHERE location = 1";
	
	$condition = " AND ";
	if (isset ($_POST)) {
		//Si on a définit un prix minimum, on ajoute la condition
		if ($_POST['minimumPrice_Loc'] > 0) {
			$sql=$sql.' AND price >= '.$_POST['minimumPrice_Loc'];
		}
		$_SESSION['minimumPriceFilter_Loc'] = $_POST['minimumPrice_Loc'];

		//Si on a définit un prix maximum, on ajoute la condition
		if ($_POST['maximumPrice_Loc'] > 0) {
			$sql=$sql.' AND price <= '.$_POST['maximumPrice_Loc'];
		}
		$_SESSION['maximumPriceFilter_Loc'] = $_POST['maximumPrice_Loc'];

		$firstTypeCondition = False;
		unset($_SESSION['maisonFilter_Loc']);
		unset($_SESSION['appartFilter_Loc']);
		unset($_SESSION['terrainFilter_Loc']);

		if (isset($_POST['maisonFilter_Loc'])) {
			if ($firstTypeCondition == False) {
				$sql=$sql." AND (type = 'maison'";
				$firstTypeCondition = True;
			}else{
				$sql=$sql." OR type = 'maison'";
			}
			$_SESSION['maisonFilter_Loc'] = True;
		}

		if (isset($_POST['appartFilter_Loc'])) {
			if ($firstTypeCondition == False) {
				$sql=$sql." AND (type = 'appartement'";
				$firstTypeCondition = True;
			}else{
				$sql=$sql." OR type = 'appartement'";
			}
			$_SESSION['appartFilter_Loc'] = True;
		}

		if (isset($_POST['terrainFilter_Loc'])) {
			if ($firstTypeCondition == False) {
				$sql=$sql." AND (type = 'terrain'";
				$firstTypeCondition = True;
			}else{
				$sql=$sql." OR type = 'terrain'";
			}
			$_SESSION['terrainFilter_Loc'] = True;
		}

		if ($firstTypeCondition) {
			$sql = $sql.')';
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
	var_dump($sql);
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
	$a_remplacer_par = "?page=location";
	$resultat = str_replace($morceau_a_remplacer, $a_remplacer_par, $adresse);
	header("location:" . $resultat);
?>