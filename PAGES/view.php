<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SOPH'IMMO</title>
	<link rel="stylesheet" type="text/css" href="STYLE/style1.css">
</head>
<body>
	<header>
	    Votre Agence immobilière au plus près de chez vous
        <a href=".?page=connexion"><h6>Se connecter</h6></a>
        <?php
        if (isset($_SESSION["user"])) {
            echo "<h7>".$_SESSION["user"]."</h7>";
            /*if ($_SESSION["admin"] == 1) {
                echo "ADMIN";
            }*/
        }
        ?>
        <nav>
            <ul>
                <a href=".?page=home"><li id="menu">Accueil</li></a>
                <a href=".?page=architecture"><li id="menu">Architecture</li></a>
                <a href=".?page=location"><li id="menu">Location</li></a>
                <a href=".?page=transaction"><li id="menu">Transaction</li></a>
                <a href=".?page=honoraire"><li id="menu">Honoraires</li></a>
                <a href=".?page=rendezvous"><li id="menu">Prise de rendez-vous</li></a>
                <a href=".?page=new"><li id="menu">Admin</li></a>
            </ul>
        </nav>
	</header>

	<main>
		<?php
			include "PAGES/".$page.".php";

		?>
    	</main>


	<footer>
        <article>
		<section>
            <h2>Horaires d'ouverture</h2>
            <table align="center">
                <tr>
                    <th>Jour</th>
                    <th>Matin</th>
                    <th>Après-midi</th>
                </tr>
                <tr>
                    <td align='center'>Lundi</td>
                    <td align='center'>9h - 12h</td>
                    <td align="center">13h30 - 18h</td>
                </tr>
                <tr>
                    <td align='center'>Mardi</td>
                    <td align='center'>9h - 12h</td>
                    <td align="center">13h30 - 18h</td>
                </tr>
                <tr>
                    <td align='center'>Mercredi</td>
                    <td align='center'>9h - 12h</td>
                    <td align="center">Fermé</td>
                </tr>
                <tr>
                    <td align='center'>Jeudi</td>
                    <td align='center'>9h - 12h</td>
                    <td align="center">13h30 - 18h</td>
                </tr>
                <tr>
                    <td align='center'>Vendredi</td>
                    <td align='center'>9h - 12h</td>
                    <td align="center">13h30 - 18h</td>
                </tr>
                <tr>
                    <td align='center'>Samedi</td>
                    <td align='center'>Fermé</td>
                    <td align="center">15h - 18h</td>
                </tr>
                <tr>
                    <td align='center'>Dimanche</td>
                    <td align='center'>Fermé</td>
                    <td align="center">Fermé</td>
                </tr>
                <tr>
                    <td align='center'>Jours fériés</td>
                    <td align='center'>Fermé</td>
                    <td align="center">Fermé</td>
                </tr>
            </table>
        </section>
        </article>
        <article>
        <section>
            <h2>Pour nous contacter : </h2>
            <p>Mail : sophie.bailly32@gmail.com</p>
            <p>Téléphone : 07.61.84.68.48</p>
            <p>Directement à l'agence sur les horaire d'ouverture</p>
                <p>Rue de Salins</p>
                <p>25000 PONTARLIER  </p>    
            <p><img src="./IMAGES/insta.png" class="network"/><img src="./IMAGES/facebook.png" class="network"/></p>
        </section>
        </article>
	</footer>
</body>
</html>