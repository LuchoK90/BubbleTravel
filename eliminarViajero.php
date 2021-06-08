<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$idViajero=$_GET["idVi"];
$idViaje=$_GET["idV"];

 $usuario = $conexion->prepare("DELETE FROM viajeros WHERE id=:idViajero");


	  $usuario->bindParam(":idViajero", $idViajero, PDO::PARAM_INT);


      $usuario->execute(); 


 header("location: viajeros.php?id=$idViaje");
} else {
header("location: miBubbleTravel.php");
}

?>