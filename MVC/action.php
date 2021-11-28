<?php
//action à faire

$page = "home";
if (isset($_GET['page'])) 
	$page = $_GET['page'];

$locations = LoadLocations ();
$rdv = LoadRdv();