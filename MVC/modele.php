<?php 
// Modèle

function LoadLocations () {
	global $c;
	$sql = "select * from location/sell";
	$result = mysqli_query ($c, $sql);
	$list = [];
	while ($row = mysqli_fetch_assoc($result))
		$list[] = $row; // Ajouter dans la liste
	return $list;
}

function DisplayDonnees ($list) {
	foreach ($list as $key => $value) {
		echo "<li>";
		echo "<h2>".$value["name"]."</h2>";
		echo "<p>Localisation : ".$value["location"]."</p>";
		echo "<p>Prix : ".$value["price"]."</p>";
		echo "<p>".$value["price"]."</p>";
		echo "<p>Consommation energie : ".$value["energy"]."</p>";
		echo "<p>GreenHouse : ".$value["greenhouseEff"]."</p>";
		echo "</li>";
	}
}