<p>Register</p>
<?php 
	if (isset($_SESSION["REGISTER_ERROR_SAFE"])) {
		if ($_SESSION["REGISTER_ERROR_SAFE"] > 0) {
			echo '<p class="registerErrorMessage">'.$_SESSION["REGISTER_ERROR"].'</p>';
			$_SESSION["REGISTER_ERROR_SAFE"] = $_SESSION["REGISTER_ERROR_SAFE"] - 1;
		}
	}

?>
<form method="post" action="index.php" class="formLogin">
	<li>
		<p>Courriel</p>
		<input type="email" name="register_username">
	</li>

	<li>
		<p>Mot de passe</p>
		<input type="password" name="register_password">
	</li>

	<li>
		<p>Confirmer mot de passe</p>
		<input type="password" name="register_check_password">
	</li>
	
	<li>
		<input type="submit" name="send" value="Créer mon compte">
	</li>
</form>