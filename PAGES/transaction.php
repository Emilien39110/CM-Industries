<nav class="recherche">

    <form action='./MVC/useFilterTrans.php' method='post' >
    	<label>Type</label>
        <p>Maison
            <?php 
        if (isset($_SESSION['maisonFilter_Trans'])) {
            echo "<input type='checkbox' name='maisonFilter_Trans' checked>";
        }else{
            echo "<input type='checkbox' name='maisonFilter_Trans'>";
        }
        ?>
        
        </p>
        <p>Appartement
            <?php 
        if (isset($_SESSION['appartFilter_Trans'])) {
            echo "<input type='checkbox' name='appartFilter_Trans' checked>";
        }else{
            echo "<input type='checkbox' name='appartFilter_Trans'>";
        }
        ?>
        </p>
        <p>Terrain
            <?php 
        if (isset($_SESSION['terrainFilter_Trans'])) {
            echo "<input type='checkbox' name='terrainFilter_Trans' checked>";
        }else{
            echo "<input type='checkbox' name='terrainFilter_Trans'>";
        }
        ?>
        </p>

        <label>Prix</label>
        <?php 
        //Affiche les prix minimum et maximum en gardant la valeur précédente entrée
        if (isset($_SESSION['minimumPriceFilter_Trans'])) {
            echo "<input type='number' name='minimumPrice_Trans' min=0 value=".$_SESSION['minimumPriceFilter_Trans'].">";
        }else{
            echo "<input type='number' name='minimumPrice_Trans' min=0 value=0>";
        }

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
        <option value='normal'> de 20m² à 50m²</option>
        <option value='grand'>+ 50m²</option>
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