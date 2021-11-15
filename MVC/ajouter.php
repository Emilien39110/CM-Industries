<?php
$c = mysqli_connect("localhost", "l2", "L2", "CMIndustries");
mysqli_set_charset($c, "utf8");
// global $c;
// var_dump($_POST["nom"]);
// var_dump($_POST["localisation"]);
// var_dump($_POST["description"]);
// var_dump($_POST["prix"]);
// var_dump($_POST["energie"]);
// var_dump($_POST["effetserre"]);
// var_dump($_POST["location"]);

$sql =
"insert into location/sell(name,localisation,description,price,energy,greenhouseg,location) values('".$_POST["nom"]."','".$_POST["localisation"]."','".$_POST["description"]."',".$_POST["prix"].", '".$_POST["energie"]."','".$_POST["effetserre"]."','".$_POST["location"]."')";
var_dump($sql);

$result = mysqli_query($c, $sql);

var_dump($result);




?>





	<!-- $c = mysqli_connect("localhost", "l2", "L2", "CMIndustries");
	mysqli_set_charset($c, "utf8");	

	$sql=
	 "insert into Location/sell (name, localisation, description, 'price', energy, greenhouseg, location) values ('".$_POST['nom']."', '".$_POST['localisation']."', '".$_POST['description']."', ".$_POST['prix']." , '".$_POST['energie']."' , '".$_POST['effetserre']."', '".$_POST['location']."')";

	$result = mysqli_query($c,$sql);
	var_dump($result);
	//header("location: ./PAGES/location.php"); -->