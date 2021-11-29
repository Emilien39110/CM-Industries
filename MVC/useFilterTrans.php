<?php
	session_start();
	$c = mysqli_connect("localhost", "l2", "L2", "CMIndustries");
	mysqli_set_charset($c, "utf8");	
	
	$sql = "SELECT * FROM `location_vente` WHERE location = 0";
	
	if (isset ($_POST)) {
		//Si on a définit un prix minimum, on ajoute la condition
		if ($_POST['minimumPrice_Trans'] > 0) {
			$sql=$sql.' AND price >= '.$_POST['minimumPrice_Trans'];
		}
		$_SESSION['minimumPriceFilter_Trans'] = $_POST['minimumPrice_Trans'];

		//Si on a définit un prix maximum, on ajoute la condition
		if ($_POST['maximumPrice_Trans'] > 0) {
			$sql=$sql.' AND price <= '.$_POST['maximumPrice_Trans'];
		}
		$_SESSION['maximumPriceFilter_Trans'] = $_POST['maximumPrice_Trans'];

		$firstTypeCondition = False;
		unset($_SESSION['maisonFilter_Trans']);
		unset($_SESSION['appartFilter_Trans']);
		unset($_SESSION['terrainFilter_Trans']);

		if (isset($_POST['maisonFilter_Trans'])) {
			if ($firstTypeCondition == False) {
				$sql=$sql." AND (type = 'maison'";
				$firstTypeCondition = True;
			}else{
				$sql=$sql." OR type = 'maison'";
			}
			$_SESSION['maisonFilter_Trans'] = True;
		}

		if (isset($_POST['appartFilter_Trans'])) {
			if ($firstTypeCondition == False) {
				$sql=$sql." AND (type = 'appartement'";
				$firstTypeCondition = True;
			}else{
				$sql=$sql." OR type = 'appartement'";
			}
			$_SESSION['appartFilter_Trans'] = True;
		}

		if (isset($_POST['terrainFilter_Trans'])) {
			if ($firstTypeCondition == False) {
				$sql=$sql." AND (type = 'terrain'";
				$firstTypeCondition = True;
			}else{
				$sql=$sql." OR type = 'terrain'";
			}
			$_SESSION['terrainFilter_Trans'] = True;
		}

		if ($firstTypeCondition) {
			$sql = $sql.')';
		}
	}

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