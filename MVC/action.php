<?php
//action à faire

$page = "home";
if (isset($_GET['page'])) 
	$page = $_GET['page'];

$locations = LoadLocations ();

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
	header("Location: .");
}