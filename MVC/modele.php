<?php 
// Modèle

function LoadLocations () {
    global $c;
    $sql="SELECT * FROM `location_vente` WHERE location = 1 and vendu = 0";
    $result=mysqli_query($c, $sql);
    while($row = mysqli_fetch_assoc($result))
		$list[] = $row;
	return $list;
}

function LoadTransactions () {
    global $c;
    $sql="SELECT * FROM `location_vente` WHERE location = 0 AND vendu = 0";
    $result=mysqli_query($c, $sql);
    while($row = mysqli_fetch_assoc($result))
		$list[] = $row;
	return $list;
}

function DisplayDonnees ($list) {
	if ($list == null){
		echo "<article><h2>Aucun résultat ne correspond à votre recherche.</h2></article>";
	}else {
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
		echo "<section><p class='gras'>Les alentours :</p>";
		echo "<iframe
                  width='400'
                  height='300'
                  style='border:5'
                  loading='lazy'
                  allowfullscreen
                  src='https://www.google.com/maps/embed/v1/place?key=AIzaSyC8-1Smq4p1O6aO3IGl8Pa_t6CZyfLUFCs
                    &q=".$value["localisation"]."'>
                </iframe></section>";
		if (is_dir('./IMAGES/'.$value['name'])) { 
			$tablofichier =scandir('./IMAGES/'.$value['name']);
			foreach ($tablofichier as  $elmtablofichier ){
				if ($elmtablofichier != '.' && $elmtablofichier != '..') {
					echo "<section><p class='gras'>Image du bien :</p>";
					echo "<img src='./IMAGES/" . $value['name'] . "/". $elmtablofichier . "' alt='imhouse' class='imhouse'/></section>";	
				}
			}
		}
		//-------------------------------------------------------------------------------------------------------

		echo "</article>";
		}
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

function DisplayLocalisation ($list) {
	$Avant = "";
	echo "<label for='localisation'>Localisation</label>
        <select name='localisation' id='localisation'>";
        echo "<option value=''>--Choisir une option--</option>";
	foreach ($list as $key => $value) {
		if ($value["localisation"] != $Avant) {
			echo "<option value='".$value["localisation"]."'> ".$value["localisation"]." </option>";
		}
		$Avant = $value["localisation"];
	}
	echo "</select>";
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
				echo "<td>".$value[$i]["horaire"]."h / </td>";
			}
		}
		echo "</ul> </br>";
	}
	echo "</br><h2>Réserver un créneau : </h2>";

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
			<option value='Visite de bien '>Visite de bien</option>
			<option value='Rendez-vous en agence '>Rendez-vous en agence</option>
			<option value='Acheter un bien '>Acheter un bien</option>
			<option value='Louer un bien '>Louer un bien</option>
			<option value='Estimation '>Estimation</option>
			</select></br>";
	if(isset($_SESSION['error_type']))
		echo "<p>".$_SESSION['error_type']."</p>";
	echo "<input type='submit' name='action' value='Reserver'>";
	echo "</form>";
}
function connection($usernameF1_,$passwordF1_){
    $coCheck = logInCheck($usernameF1_,$passwordF1_);
    
    if ($coCheck){
        $hasAdmin = isAdmin($usernameF1_);
        if ($hasAdmin) {
            $_SESSION['admin'] = 1;
        }
        $_SESSION['user'] = $usernameF1_;

	}
}

function logInCheck($usernameF1_, $passwordF1_) {
    global $c;
    $sqlF1 = "SELECT * FROM `login` WHERE login = '".$usernameF1_."'";
    $resultF1 = mysqli_query($c, $sqlF1);
    $row = mysqli_fetch_assoc($resultF1);
    return $passwordF1_ == $row["password"];
}

function isAdmin($usernameF2_){
    global $c;
    $sqlF2 = "SELECT * FROM `login` WHERE login = '".$usernameF2_."'";
    $resultF2 = mysqli_query($c, $sqlF2);
    $row = mysqli_fetch_assoc($resultF2);
    return ($row["adminpermissions"] == 1) ;

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
				echo "<td>".$value[$i]["horaire"]."h - </td>";
				echo "<td>".$value[$i]["info"]."</td> - ";
				echo "<td>".$value[$i]["mail"]."</td></br>";
			}
		}
		echo "</ul> </br>";
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

function insertFilterCheckBox($inputName) {
	global $_POST;
	echo "<input type='checkbox' name=".$inputName;
	if (isset($_POST[$inputName])) {
		echo " checked";
	}
	echo ">";
}

function useFilter($inputName, $sqlCondition) {
	global $sql;
	global $sqlFilterCount;
	global $_POST;

	if (isset($_POST[$inputName])) {
		if ($sqlFilterCount == 0) {
			$sql = $sql." WHERE ".$sqlCondition;
		}else{
			$sql = $sql." OR ".$sqlCondition;
		}
		$sqlFilterCount = $sqlFilterCount + 1;
	}
}

function insertFilterNumber($inputName) {
	global $_POST;
	echo "<input type='number' name=".$inputName;
	if (isset($_POST[$inputName])) {
		echo " value=".$_POST[$inputName];
	}
	echo " min=0>";
}

function DisplayGoodsSellList($list){
	// echo "toto";
	foreach($list as $goods){
		echo "<option value=".$goods["idhouse"].">".$goods["name"]."</option>";
	}
}
?>
