<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php
			if (isset($_SESSION["user"])) {
				echo "<p>".$_SESSION["user"]."</p>";
				if ($_SESSION["admin"] == 1) {
					echo "ADMIN";
				}
				include_once("logoutForm.php");
			}else{
				include_once("loginForm.php");
				include_once("registerForm.php");
			}
		?>
	</body>
</html>