<nav class="recherche">

    <form action='./MVC/usefilter.php' method='post' >
    	<label for='type'>Type</label>
        <select name='type' id='type'>
        <option value=''>--Choisir une option--</option>
        <option value='Maison'>Maison</option>
        <option value='Appartement'>Appartement</option>
        <option value='Terrain'>Terrain</option>
        </select>

    	<label for='price'>Prix</label>
        <select name='price' id='price'>
        <option value=''>--Choisir une option--</option>
        <option value='500'>- 500€</option>
        <option value='800'>de 501€ à 800€</option>
        <option value='801'>+ 800€</option>
        </select>

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
	else DisplayDonnees ($locations);
	echo "</section>";
    unset($_SESSION['requetefiltre']);
?>