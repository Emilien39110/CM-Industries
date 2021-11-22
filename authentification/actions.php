<?php

$page = "home";
if (isset($_GET["page"]))
	$page = $_GET["page"];

function logIn($usernameF1_, $passwordF1_) {
	global $c;

	$sqlF1 = "SELECT * FROM `login`";
	$resultF1 = mysqli_query($c, $sqlF1);

	$trouve = False;

	while ($row = mysqli_fetch_assoc($resultF1)) {
		if (($usernameF1_ == $row["login"]) and ($passwordF1_ == $row["password"])) {
			$_SESSION["user"] = $row["login"];
			$_SESSION["admin"] = $row["adminpermissions"];
			$trouve = True;
		}
	}

	if ($trouve == False) {
		$_SESSION["LOGIN_ERROR"] = "Courriel ou mot de passe incorrect";
		$_SESSION["LOGIN_ERROR_SAFE"] = 2;
	}
	
	header("Location: .");
}

//Connexion
if (isset($_POST["login_username"]) && isset($_POST["login_password"]) && $_POST["login_username"] != "" && $_POST["login_password"] != "") {
	logIn($_POST["login_username"], $_POST["login_password"]);
}else{
	if (isset($_POST["login_username"]) || isset($_POST["login_username"])) {
		$_SESSION["LOGIN_ERROR"] = "Formulaire incomplet";
		$_SESSION["LOGIN_ERROR_SAFE"] = 2;
	}
}

//Création de compte
if (isset($_POST["register_username"]) && isset($_POST["register_password"]) && isset($_POST["register_check_password"]) && ($_POST["register_username"] != "") && ($_POST["register_password"] != "") && ($_POST["register_check_password"] != "")) {
	global $REGISTER_ERROR;

	//Si le mot de passe et la confirmation du mot de passe sont égaux
	if ($_POST["register_password"] == $_POST["register_check_password"]) {
		$sql = "SELECT * FROM `login`";
		$result = mysqli_query($c, $sql);

		//Vérifie si l'email est déjà utilisée
		$nomPris = False;
		while ($row = mysqli_fetch_assoc($result)) {
			if (($_POST["register_username"] == $row["login"])) {
				$nomPris = True;
			}
		}

		//Si l'email est nouvelle, créer le compte
		if ($nomPris == False) {
			$sql_ = "insert into login (login, password, adminpermissions) values (
			'".$_POST["register_username"]."',
			'".$_POST["register_password"]."', 0)";

			mysqli_query($c, $sql_);

			//Se connecter sur le compte tout juste créé
			logIn($_POST["register_username"], $_POST["register_password"]);
		}else{
			$_SESSION["REGISTER_ERROR"] = "Courriel déjà utilisée";
			$_SESSION["REGISTER_ERROR_SAFE"] = 2;
		}
	}else{
		$_SESSION["REGISTER_ERROR"] = "Mot de passe et Confirmation de mot de passe différents";
		$_SESSION["REGISTER_ERROR_SAFE"] = 2;
	}
	header("Location: .");
}else{
	if (isset($_POST["register_username"]) || isset($_POST["register_password"]) || isset($_POST["register_check_password"])) {
		$_SESSION["REGISTER_ERROR"] = "Formulaire incomplet";
		$_SESSION["REGISTER_ERROR_SAFE"] = 2;
	}
}

//Se déconnecter
if(isset($_POST['logOutButton'])) {
	unset($_SESSION['user']);
	header("Location: .");
}
?>