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
	$jour = [
		"lundi" => $lundi,
		"mardi" => $mardi,
		"mercredi" => $mercredi,
		"jeudi" => $jeudi,
		"vendredi" => $vendredi,
		"samedi" => $samedi
	];
	foreach ($jour as $key => $value) {
		echo "<ul>";
		echo "<td> <b>".$key."</b> </td>";
		for ($i=0; $i < count($value); $i++) { 
			if ($value[$i]["etat"] == "libre") {
				echo "<td>".$value[$i]["horaire"]."h</td>";
			}
		}
		echo "</ul>";
	}

	echo "<form action='./MVC/takerdv.php' method='post'>
			<select name='horaire' id='horaire-select'>
				<option value=''> --Selectionner un horaire disponible-- </option>";
	foreach ($list as $key => $value) {
		if ($value["etat"] == "libre") {
			echo "<option value=".$value["idrdv"]."> ".$value["jour"]." ".$value["horaire"]."h </option>";
		}
	}
	echo "<input type='submit' value='Reserver'>";
	echo "	</select>
		  </form>";
}