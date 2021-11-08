<?php
session_start();

// Base de données
include_once "MVC/db.php";

// Controleur
include_once "MVC/action.php";

//Page location
include_once "MVC/location.php";

//Page transaction
include_once "MVC/transaction.php";

//Page architecture
include_once "MVC/architecture.php";

// Vue
include_once "MVC/view.php";

?>