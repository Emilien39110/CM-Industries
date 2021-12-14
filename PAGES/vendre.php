<?php 
$c = mysqli_connect("localhost", "l2", "L2", "CMIndustries");
mysqli_set_charset($c,"utf8");
// var_dump($_POST);
$id = $_POST['id'];

$sql = "UPDATE location_vente SET vendu = 1 WHERE idhouse = $id";
// var_dump($sql);
$result = mysqli_query($c,$sql);
// var_dump($result);
header("Location: ..?page=admin");

?>