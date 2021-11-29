<?php
	session_start();
	$c = mysqli_connect("localhost", "l2", "L2", "CMIndustries");
	mysqli_set_charset($c, "utf8");	
	
	$sql = "SELECT * FROM `location_vente` WHERE location = 0";
	
	if (isset ($_POST)) {
		//Si on a définit un prix minimum, on ajoute la condition
		if ($_POST['minimumPrice'] > 0) {
			$sql=$sql.' AND price >= '.$_POST['minimumPrice'];
		}
		$_SESSION['minimumPriceFilter'] = $_POST['minimumPrice'];

		//Si on a définit un prix maximum, on ajoute la condition
		if ($_POST['maximumPrice'] > 0) {
			$sql=$sql.' AND price <= '.$_POST['maximumPrice'];
		}
		$_SESSION['maximumPriceFilter'] = $_POST['maximumPrice'];
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