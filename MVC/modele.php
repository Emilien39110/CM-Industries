<?php 
// Modèle

function LoadLocations () {
    global $c;
    $sql = "SELECT * FROM `Location/sell`";
    $result = mysqli_query($c, $sql);
	$list = [];
	while ($row = mysqli_fetch_assoc($result))
		$list[] = $row;
	return $list;
}

function DisplayDonnees ($list) {
	foreach ($list as $key => $value) {
		echo "<article class='background'>";
		echo "<h2>".$value["name"]."</h2>";
		echo "<p><b>Localisation : </b>".$value["localisation"]."</p>";
		echo "<p><b>Prix :</b> ".$value["description"]."</p>";
		echo "<p>".$value["price"]."</p>";
		echo "<section><p class='gras'>Consommation energie :</p>";
		echo" <img src='./IMAGES/energie/".$value["energy"].".png' alt='energie' class='energie'/></section>";
		echo "<section><p class='gras'>GreenHouse :</p>";
		echo" <img src='./IMAGES/effet_serre/".$value["greenhouseg"].".png' alt='energie' class='energie'/></section>";
		echo "</article>";
	}
}

function LoadRdv () {
	global $c;
	$sql = "select * from rendez_vous";
	$result = mysqli_query ($c, $sql);
	$list = [];
	while ($row = mysqli_fetch_assoc($result))
		$list[] = $row; // Ajouter dans la liste
	return $list;
}

function DisplayRdv ($list) {
	$lundi = [];
	$mardi = [];
	$mercredi = [];
	$jeudi = [];
	$vendredi = [];
	$samedi = [];
	foreach ($list as $key => $value) {
		if ($value["jour"] == "lundi") {
			$lundi[] = $value;
		}
		if ($value["jour"] == "mardi") {
			$mardi[] = $value;
		}
		if ($value["jour"] == "mercredi") {
			$mercredi[] = $value;
		}
		if ($value["jour"] == "jeudi") {
			$jeudi[] = $value;
		}
		if ($value["jour"] == "vendredi") {
			$vendredi[] = $value;
		}
		if ($value["jour"] == "samedi") {
			$samedi[] = $value;
		}
	}
	echo "<ul> <tr>";
	echo "<td> <b>Lundi</b> </td>";
	for ($i=0; $i < count($lundi); $i++) { 
		if ($lundi[$i]["etat"] == "libre") {
			echo "<td>".$lundi[$i]["horaire"]."h</td>";
		}
	}
	echo "</tr> </ul>";
	echo "<ul>";
	echo "<td> <b>mardi</b> </td>";
	for ($i=0; $i < count($mardi); $i++) { 
		if ($mardi[$i]["etat"] == "libre") {
			echo "<td>".$mardi[$i]["horaire"]."h</td>";
		}
	}
	echo "</ul>";
	echo "<ul>";
	echo "<td> <b>mercredi</b> </td>";
	for ($i=0; $i < count($mercredi); $i++) { 
		if ($mercredi[$i]["etat"] == "libre") {
			echo "<td>".$mercredi[$i]["horaire"]."h</td>";
		}
	}
	echo "</ul>";
	echo "<ul>";
	echo "<td> <b>jeudi</b> </td>";
	for ($i=0; $i < count($jeudi); $i++) { 
		if ($jeudi[$i]["etat"] == "libre") {
			echo "<td>".$jeudi[$i]["horaire"]."h</td>";
		}
	}
	echo "</ul>";
	echo "<ul>";
	echo "<td> <b>vendredi</b> </td>";
	for ($i=0; $i < count($vendredi); $i++) { 
		if ($vendredi[$i]["etat"] == "libre") {
			echo "<td>".$vendredi[$i]["horaire"]."h</td>";
		}
	}
	echo "</ul>";
	echo "<ul>";
	echo "<td> <b>samedi</b> </td>";
	for ($i=0; $i < count($samedi); $i++) { 
		if ($samedi[$i]["etat"] == "libre") {
			echo "<td>".$samedi[$i]["horaire"]."h</td>";
		}
	}
	echo "</ul>";
}