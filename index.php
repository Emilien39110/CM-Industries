<?php
session_start();

// Base de données
include_once "MVC/db.php";

// Modèle
include_once "MVC/modele.php";

// Librairie Email
include_once "MVC/test_mail.php";

// Controleur
include_once "MVC/action.php";

// Vue
include_once "MVC/view.php";

?>