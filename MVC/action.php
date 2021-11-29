<?php
//action à faire

$page = "home";
if (isset($_GET['page'])) 
	$page = $_GET['page'];

$locations = LoadLocations();
$transactions = LoadTransactions();

$rdv = LoadRdv();

//Connexion
if (isset($_POST["login_username"]) && isset($_POST["login_password"]) && $_POST["login_username"] != "" && $_POST["login_password"] != "") {
	connection($_POST["login_username"], $_POST["login_password"]);
}else{
	if (isset($_POST["login_username"]) || isset($_POST["login_password"])) {
		$_SESSION["LOGIN_ERROR"] = "Formulaire incomplet";
		$_SESSION["LOGIN_ERROR_SAFE"] = 2;
	}
}

//Création de compte
$register = isset($_POST["register_username"]) && isset($_POST["register_password"]) && isset($_POST["register_check_password"]);
//$notEmpty = ($_POST["register_username"] != "") && ($_POST["register_password"] != "") && ($_POST["register_check_password"] != "");
if ($register) {
	//Si le mot de passe et la confirmation du mot de passe sont égaux
	if ($_POST["register_password"] == $_POST["register_check_password"]) {
		$sql = "SELECT * FROM `login`WHERE login = '".$_POST["register_username"]."'";
		$result = mysqli_query($c, $sql);
		$row = mysqli_fetch_assoc($result);

		//Vérifie si l'email est déjà utilisée
		$nomPris = isset($row);
	
	//Si l'email est nouvelle, créer le compte
		if ($nomPris == False) {
			$sql_ = "insert into login (login, password, adminpermissions) values (
			'".$_POST["register_username"]."',
			'".$_POST["register_password"]."', 0)";

			mysqli_query($c, $sql_);

			//Se connecter sur le compte tout juste créé
			connection($_POST["register_username"], $_POST["register_password"]);
		}else{
			$_SESSION["REGISTER_ERROR"] = "Courriel déjà utilisée";
			$_SESSION["REGISTER_ERROR_SAFE"] = 1;
		}
	}else{
		$_SESSION["REGISTER_ERROR"] = "Mot de passe et Confirmation de mot de passe différents";
		$_SESSION["REGISTER_ERROR_SAFE"] = 1;
	}
	// header("Location: .");
}else{
	if (isset($_POST["register_username"]) || isset($_POST["register_password"]) || isset($_POST["register_check_password"])) {
		$_SESSION["REGISTER_ERROR"] = "Formulaire incomplet";
		$_SESSION["REGISTER_ERROR_SAFE"] = 1;
	}
}

//Se déconnecter
if(isset($_POST['logOutButton'])) {
	unset($_SESSION['user']);
	unset($_SESSION['admin']);
	header("Location: .");
}

//Filtres
$sqlFilterRequest = "SELECT * FROM `location_vente`";
$sqlFilterCount = 0;

//-----PRIX MINIMUM ET MAXIMUM--------------------------------------
//Prix minimum
if (isset($_POST["minimumPrice"]) and $_POST["minimumPrice"] != 0) {
	if ($sqlFilterCount == 0) { //Si on est la première condition, on doit insérer un "WHERE"
		$sqlFilterRequest = $sqlFilterRequest." WHERE (price >".$_POST["minimumPrice"];
	}else{
		$sqlFilterRequest = $sqlFilterRequest." AND (price >".$_POST["minimumPrice"];
	}
	$sqlFilterCount = $sqlFilterCount + 1;
}

//Prix maximum
if (isset($_POST["maximumPrice"]) and $_POST["maximumPrice"] != 0) {
	if ($sqlFilterCount == 0) { //Si on est la première condition, on doit insérer un "WHERE"
		$sqlFilterRequest = $sqlFilterRequest." WHERE (price <".$_POST["maximumPrice"];
	}else{
		$sqlFilterRequest = $sqlFilterRequest." AND price <".$_POST["maximumPrice"];
	}
	$sqlFilterCount = $sqlFilterCount + 1;
}

//Fermer la parenthèse de la condition si il y a un prix minimum ou maximum
if ((isset($_POST["minimumPrice"]) and $_POST["minimumPrice"] != 0) or (isset($_POST["maximumPrice"]) and $_POST["maximumPrice"] != 0)) {
	$sqlFilterRequest = $sqlFilterRequest.")";
}


//------------------------------------------------------------------