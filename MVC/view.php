<?php
//unset($_SESSION['state']);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SOPH'IMMO</title>
	<link rel="stylesheet" type="text/css" href="./STYLE/style1.css">
</head>
<body>
	<header>
        <section>
            <div>
            <!-- <img src='./IMAGES/logo.png' id='logo'/> -->
            </div>
            <div>
            <h1>Votre Agence immobilière au plus près de chez vous</h1>
            </div>
            <div>

            <a href=".?page=connexion">
            <?php
            if (isset($_SESSION['user'])){
                echo "</br><form method='post'><input type='submit' name='logOutButton' value='Se déconnecter' id='deco'></form></br>";
                if (isset($_POST['logOutButton']))
                    unset($_SESSION['user']);
            }else{
                echo "<a href='.?page=connexion'>";
                echo "</br><h7 id='deco'>Se connecter<h7>";
                echo "</a>";
                echo"</br></br>";
            }

            // echo  "</br>".$_SESSION['state']."</br>";

            ?>
            </a>
            </div>
        </section>


        <nav class="menu">
            <ul>
                <a href=".?page=home"><li>Accueil</li></a>
                <a href=".?page=architecture"><li>Architecture</li></a>
                <a href=".?page=location"><li>Location</li></a>
                <a href=".?page=transaction"><li>Transaction</li></a>
                <a href=".?page=honoraire"><li>Honoraires</li></a>              
                <?php
        if (isset($_SESSION["user"])){
            echo "<a href='.?page=rendezvous'><li>Prise de rendez-vous</li></a>";
            if (isset($_SESSION["admin"])){
                if ($_SESSION['admin'] == 1) {
                        echo "<a href='.?page=admin'><li>Admin</li></a>";
                }
            }

        }
        ?>
            </ul>
        </nav>
	</header>

	<main>
		<?php
        $permPages = ["home" => "pub", "honoraire" => "pub", "location" => "pub", "transaction" => "pub", "rendezvous" => "user", "admin" => "admin", "connexion" => "pub"];
            if ($permPages[$page]=="user"){
                if (isset($_SESSION['user'])){
                    include "PAGES/".$page.".php";
                } else {
                    include "PAGES/connexion.php";
                }
            } else if ($permPages[$page]=="admin"){
                if (isset($_SESSION['user'])){
                    if (isset($_SESSION['admin']) and ($_SESSION['admin']==1)){
                        include "PAGES/".$page.".php";
                    }
                } else {
                    include "PAGES/connexion.php";
                }
            } else {
                include "PAGES/".$page.".php";
            }
			//include "PAGES/".$page.".php";
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
                <img src='./IMAGES/logo1.png' id='logo'/>
            <h2>Pour nous contacter : </h2>
            <p>Mail : sophie.bailly32@gmail.com</p>
            <p>Téléphone : 07.61.84.68.48</p>
            <p>Directement à l'agence sur les horaire d'ouverture</p>
                <p>Rue de Salins</p>
                <p>25300 PONTARLIER  </p>    
            <p>
                <a href="https://www.instagram.com/sophimmo1/?hl=fr"><img src="./IMAGES/insta.png" class="network"/></a>
                <a href="https://www.facebook.com/Sophimmo-249689356927183"><img src="./IMAGES/facebook.png" class="network"/></a></br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2725.728498853055!2d6.3391884154824485!3d46.908057679144605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478da3334c4a79ad%3A0xfe044134c0525881!2sRue%20de%20Salins%2C%2025300%20Pontarlier!5e0!3m2!1sfr!2sfr!4v1638793049820!5m2!1sfr!2sfr" width="400" height="300" style="border:5;" allowfullscreen="" loading="lazy"></iframe>
            </p>
            <p>&copy CMIndustries<p>
        </section>
        </article>
        
	</footer>
    
</body>
</html>