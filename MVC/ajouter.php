<?php
$c = mysqli_connect("localhost", "root", "", "CMIndustries");
mysqli_set_charset($c, "utf8");


$sql = 
"INSERT INTO `location/sell` (`name`, `localisation`, `description`, `price`, `energy`, `greenhouseg`, `location`) VALUES ('".$_POST["nom"]."','".$_POST["localisation"]."','".$_POST["description"]."',".$_POST["prix"].", '".$_POST["energie"]."','".$_POST["effetserre"]."','".$_POST["location"]."')";
var_dump($sql);

$result = mysqli_query($c, $sql);

var_dump($result);
header("Location: ../PAGES/home.php");




?>
