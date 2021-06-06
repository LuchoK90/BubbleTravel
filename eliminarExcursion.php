<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$idExcursion=$_GET["idE"];
$idViaje=$_GET["idV"];

 $usuario = $conexion->prepare("DELETE FROM excursiones WHERE id=:idExcursion");


	  $usuario->bindParam(":idExcursion", $idExcursion, PDO::PARAM_INT);


      $usuario->execute(); 
echo $idExcursion;
echo $idViaje;

 header("location: excursiones.php?id=$idViaje");
} else {
header("location: miBubbleTravel.php");
}

?>