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

        if (isset($_SESSION['maximumPriceFilter_Trans'])) {
            echo "<input type='number' name='maximumPrice_Trans' min=0 value=".$_SESSION['maximumPriceFilter_Trans'].">";
        }else{
            echo "<input type='number' name='maximumPrice_Trans' min=0 value=0>";
        }
        

        DisplayLocalisation ($transactions);
        ?>

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