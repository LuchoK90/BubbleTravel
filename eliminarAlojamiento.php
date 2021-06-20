<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$idAlojamiento=$_GET["idA"];
$idViaje=$_GET["idV"];

 $usuario = $conexion->prepare("DELETE FROM alojamiento WHERE id=:idAlojamiento");


	  $usuario->bindParam(":idAlojamiento", $idAlojamiento, PDO::PARAM_INT);


      $usuario->execute(); 


 header("location: alojamientos.php?id=$idViaje");
} else {
header("location: miBubbleTravel.php");
}

?>