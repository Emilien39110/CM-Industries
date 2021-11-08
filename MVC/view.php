<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../STYLE/style.css">
	<title>SOPH'IMMO</title>
	<link rel="stylesheet" type="text/css" href="../STYLE/style.css">
</head>
<body>
	<header>
	    <ce>Votre Agence immobilière au plus près de chez vous</ce>
        <nav>
            <ul>
                <li><a href=".?page=architecture">Architecture</a></li>
                <li><a href=".?page=location">Location</a></li>
                <li><a href=".?page=transaction">Transaction</a></li>
                <li><a href=".?page=honoraire">Honoraires</a></li>
            </ul>
        </nav>
	</header>

	<main>
		<?php
			include "pages/".$page.".php";
		?>
    	</main>
                <?php
        if ($page == "architecture"){
            echo"coucou";
        } else if ($page == "location"){
            echo"loc";
        } else if ($page == "transaction"){
           echo"transac";
        }else if ($page == "honoraire"){
            displayHono();
        }else
            echo "ERROR 404"
        
        ?>

	<footer>
		<section>
            <article class="contact">
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
            <h2>Pour nous contacter : </h2>
            <p>Mail : sophie.bailly32@gmail.com</p>
            <p>Téléphone : 07.61.84.68.48</p>
            <p>Directement à l'agence sur les horaire d'ouverture</p>
                <p>Rue de Salins</p>
                <p>25000 PONTARLIER   </p>    
            <p><img src="../images/insta.png" class="network"/><img src="../images/facebook.png" class="network"/></p>
            </article>
            </section>
		Emilien BOITOUZET©
	</footer>
</body>
</html>