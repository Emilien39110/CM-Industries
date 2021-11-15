<?php 
// Modèle

function LoadLocations () {
	global $c;
	$sql = "SELECT * FROM 'Location/sell'";
	$result = mysqli_query ($c, $sql);
	$list = [];
	while ($row = mysqli_fetch_assoc($result))
		$list[] = $row;
	return $list;
}

function DisplayDonnees ($list) {
	foreach ($list as $key => $value) {
		echo "<li>";
		echo "<h2>".$value["name"]."</h2>";
		echo "<p>Localisation : ".$value["localisation"]."</p>";
		echo "<p>Prix : ".$value["description"]."</p>";
		echo "<p>".$value["price"]."</p>";
		echo "<p>Consommation energie : ".$value["energy"]."</p>";
		echo "<p>GreenHouse : ".$value["greenhouseg"]."</p>";
		echo "</li>";
	}
}