<p>Login</p>

<?php 
	if (isset($_SESSION["LOGIN_ERROR_SAFE"])) {
		if ($_SESSION["LOGIN_ERROR_SAFE"] > 0) {
			echo '<p class="loginErrorMessage">'.$_SESSION["LOGIN_ERROR"].'</p>';
			$_SESSION["LOGIN_ERROR_SAFE"] = $_SESSION["LOGIN_ERROR_SAFE"] - 1;
		}
	}
?>
<form method="post" action="index.php" id="loggingIn" class="formLogin">
	<li>
		<p>Courriel</p>
		<input type="email" name="login_username">
	</li>

	<li>
		<p>Mot de passe</p>
		<input type="password" name="login_password">
	</li>

	<li>
		<input type="submit" name="send" value="Connexion">
	</li>
</form>