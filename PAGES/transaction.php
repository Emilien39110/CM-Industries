<nav class="recherche">

    <form action='./MVC/useFilterTrans.php' method='post' >
    	<label for='type'>Type</label>
        <select name='type' id='type'>
        <option value=''>--Choisir une option--</option>
        <option value='Maison'>Maison</option>
        <option value='Appartement'>Appartement</option>
        <option value='Terrain'>Terrain</option>
        </select>

    	<label>Prix</label>
        <?php 
        //Affiche les prix minimum et maximum en gardant la valeur précédente entrée
        if (isset($_SESSION['minimumPriceFilter'])) {
            echo "<input type='number' name='minimumPrice' min=0 value=".$_SESSION['minimumPriceFilter'].">";
        }else{
            echo "<input type='number' name='minimumPrice' min=0 value=0>";
        }

        if (isset($_SESSION['maximumPriceFilter'])) {
            echo "<input type='number' name='maximumPrice' min=0 value=".$_SESSION['maximumPriceFilter'].">";
        }else{
            echo "<input type='number' name='maximumPrice' min=0 value=0>";
        }
        ?>

    	<label for='localisation'>Localisation</label>
        <select name='localisation' id='localisation'>
        <option value=''>--Choisir une option--</option>
        <option value='proche'>- 10 km</option>
        <option value='modere'> de 10km à 30km</option>
        <option value='loins'>+ 30km</option>
        </select>

    	<label for='surface'>Surface</label>
        <select name='surface' id='surface'>
        <option value=''>--Choisir une option--</option>
        <option value='petit'>- 20 m² </option>
        <option value='normal'> de 20m² à 30m²</option>
        <option value='grand'>+ 30m²</option>
        <input type='submit' name='action' value='Appliquer les filtres'/>
        </select>
    </form>
</nav>


<?php
	echo "<section>";
    if (isset($_SESSION['requetefiltre'])) DisplayDonnees ($_SESSION['requetefiltre']);
	else DisplayDonnees ($transactions);
	echo "</section>";
    unset($_SESSION['requetefiltre']);
?>