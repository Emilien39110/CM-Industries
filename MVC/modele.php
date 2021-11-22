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
    return $row["adminpermissions"] == 1;
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
	// header("Location: .");
}
