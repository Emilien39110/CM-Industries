<nav>
	<label for='type'>Type</label>
    <select name='Types' id='type'>
    <option value=''>--Choisir une option--</option>
    <option value='Maison'>Maison</option>
    <option value='Appartement'>Appartement</option>
    <option value='Terrain'>Terrain</option>
    </select>

	<label for='price'>Prix</label>
    <select name='Prix' id='price'>
    <option value=''>--Choisir une option--</option>
    <option value='faible'>- 500€</option>
    <option value='moyen'>de 501€ à 800€</option>
    <option value='haut'>+ 800€</option>
    </select>

	<label for='localisation'>Prix</label>
    <select name='loc' id='localisation'>
    <option value=''>--Choisir une option--</option>
    <option value='proche'>- 10 km</option>
    <option value='modere'> de 10km à 30km</option>
    <option value='loins'>+ 30km</option>
    </select>

	<label for='surface'>Surface</label>
    <select name='surf' id='surface'>
    <option value=''>--Choisir une option--</option>
    <option value='petit'>- 20 m² </option>
    <option value='normal'> de 20m² à 30m²</option>
    <option value='grand'>+ 30m²</option>
    </select>
</nav>

<?php
	echo "<section>";
	LoadLocations();
	DisplayDonnees ($locations);
	echo "</section>";
?>