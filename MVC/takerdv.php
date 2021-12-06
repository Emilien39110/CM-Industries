<?php
	session_start();

	// Librairie Email
	include_once "test_mail.php";

	$c = mysqli_connect("localhost", "l2", "L2", "CMIndustries");
	mysqli_set_charset($c, "utf8");	

	if ($_POST['info'] == '')
		{$_SESSION['error_type'] ="Merci de saisir un motif de rendez-vous";
	}
	else {
		$sql= "UPDATE rendez_vous SET etat='pris', info='".$_POST['info']."', mail= '".$_SESSION['user']."' WHERE idrdv=" .$_POST['horaire'];
		$result=mysqli_query($c,$sql);
		if (isset($_SESSION['error_type']))
			unset($_SESSION['error_type']);
	}

	$adresse = $_SERVER['REQUEST_URI'];
	$script_courant = basename($_SERVER["SCRIPT_FILENAME"], '.php') . ".php";
	$morceau_a_remplacer = "MVC/" . $script_courant;
	$a_remplacer_par = "?page=rendezvous";
	$resultat = str_replace($morceau_a_remplacer, $a_remplacer_par, $adresse);

	$mailReceiver = $_SESSION['user'];
	$mailSubject = "Confirmation de rendez-vous";
	$mailContent = "Bonjour,</br></br><pre>Nous vous contactons pour vous annoncer qu'un de nos agents</br>sera à votre disposition pour votre rendez-vous '".$_POST['info']."' que vous avez pris sur le</br>créneau ".$_SESSION['user'].".</br></br>À très bientôt.</br></br>Cordialement,</br></br>Soph'Immo</br>Rue de Salins, 25300 Pontarlier</br>0761846848";

	send_mail($mailReceiver, $mailSubject, $mailContent);

	header("location:" . $resultat);
?>