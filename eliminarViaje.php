<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$idViaje=$_GET["id"];


$usuario = $conexion->prepare("DELETE FROM viaje WHERE id=:idViaje");


	  $usuario->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);


      $usuario->execute(); 
header("location: misViajes.php");
} else {
header("location: miBubbleTravel.php");
}

?>