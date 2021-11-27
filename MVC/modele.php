<?php 
// Modèle

function LoadLocations () {
    global $c;
    $sql="SELECT * FROM `location_vente`";
    $result=mysqli_query($c, $sql);
    while($row = mysqli_fetch_assoc($result))
		$list[] = $row;
	return $list;
}

function DisplayDonnees ($list) {
	foreach ($list as $key => $value) {
		echo "<article class='background'>";
		echo "<h2>".$value["name"]."</h2>";
		echo "<p><b>Localisation : </b>".$value["localisation"]."</p>";
		echo "<p><b>Description :</b> ".$value["description"]."</p>";
		echo "<p><b>Prix : </b>".$value["price"]." €</p>";
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

function DisplayRdvLibre ($list) {
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
	echo "</select></br>";
	echo "<select name='info' id='infordv'>
			<option value=''>--Selectionner un type de rendez-vous-- </option>
			<option value='Visite de bien'>Visite de bien</option>
			<option value='Rendez-vous en agence'>Rendez-vous en agence</option>
			<option value='Acheter un bien'>Acheter un bien</option>
			<option value='Louer un bien'>Louer un bien</option>
			<option value='Estimation'>Estimation</option>
			</select>";
	echo "<input type='submit' name='action' value='Reserver'>";
	echo "</form>";
}

function DisplayRdvPris ($list) {
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
		echo "<td> <b>".$key."</b> </td></br>";
		for ($i=0; $i < count($value); $i++) { 
			if ($value[$i]["etat"] == "pris") {
				echo "<td>".$value[$i]["horaire"]."h  </td>";
				echo "<td>".$value[$i]["info"]."</td></br>";
			}
		}
		echo "</ul>";
	}

	echo "<form action='./MVC/removerdv.php' method='post'>
			<select name='horaire' id='horaire-select'>
				<option value=''> --Selectionner un horaire disponible-- </option>";
	foreach ($list as $key => $value) {
		if ($value["etat"] == "pris") {
			echo "<option value=".$value["idrdv"]."> ".$value["jour"]." ".$value["horaire"]."h </option>";
		}
			
	}
	echo "<input type='submit' value='Liberer'>";
	echo "	</select>
		  </form>";

	// header("Location: .");
}

//Fonctions du filtre
function useFilter($inputName, $sqlCondition) {
	global $sqlFilterRequest;
	global $sqlFilterCount;
	global $_POST;

	if (isset($_POST[$inputName])) {
		if ($sqlFilterCount == 0) {
			$sqlFilterCount = $sqlFilterCount." WHERE ".$sqlCondition;
		}else{
			$sqlFilterCount = $sqlFilterCount." OR ".$sqlCondition;
		}
		$sqlFilterCount = $sqlFilterCount + 1;
	}
}

function insertFilterCheckBox($inputName) {
	global $_POST;
	echo "<input type='checkbox' name=".$inputName;
	if (isset($_POST[$inputName])) {
		echo " checked";
	}
	echo ">";
}

function insertFilterNumber($inputName) {
	global $_POST;
	echo "<input type='number' name=".$inputName;
	if (isset($_POST[$inputName])) {
		echo " value=".$_POST[$inputName];
	}
	echo " min=0>";
}