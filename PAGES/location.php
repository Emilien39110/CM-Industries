<nav class="recherche">

    <form action='./MVC/useFilterLoc.php' method='post' >
    	<label>Type</label>
        <p>Maison
            <?php 
        if (isset($_SESSION['maisonFilter_Loc'])) {
            echo "<input type='checkbox' name='maisonFilter_Loc' checked>";
        }else{
            echo "<input type='checkbox' name='maisonFilter_Loc'>";
        }
        ?>
        
        </p>
        <p>Appartement
            <?php 
        if (isset($_SESSION['appartFilter_Loc'])) {
            echo "<input type='checkbox' name='appartFilter_Loc' checked>";
        }else{
            echo "<input type='checkbox' name='appartFilter_Loc'>";
        }
        ?>
        </p>
        <p>Terrain
            <?php 
        if (isset($_SESSION['terrainFilter_Loc'])) {
            echo "<input type='checkbox' name='terrainFilter_Loc' checked>";
        }else{
            echo "<input type='checkbox' name='terrainFilter_Loc'>";
        }
        ?>
        </p>

        <label>Prix</label>
        <?php 
        //Affiche les prix minimum et maximum en gardant la valeur précédente entrée
        if (isset($_SESSION['minimumPriceFilter_Loc'])) {
            echo "<input type='number' name='minimumPrice_Loc' min=0 value=".$_SESSION['minimumPriceFilter_Loc'].">";
        }else{
            echo "<input type='number' name='minimumPrice_Loc' min=0 value=0>";
        }

        if (isset($_SESSION['maximumPriceFilter_Loc'])) {
            echo "<input type='number' name='maximumPrice_Loc' min=0 value=".$_SESSION['maximumPriceFilter_Loc'].">";
        }else{
            echo "<input type='number' name='maximumPrice_Loc' min=0 value=0>";
        }
        

    	DisplayLocalisation ($locations);
        ?>

    	<label for='surface'>Surface</label>
        <select name='surface' id='surface'>
        <option value=''>--Choisir une option--</option>
        <option value='petit'>- 20 m² </option>
        <option value='normal'>de 20m² à 50m²</option>
        <option value='grand'>+ 50m²</option> 
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