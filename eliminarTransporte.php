<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$idTransporte=$_GET["idT"];
$idViaje=$_GET["idV"];

 $usuario = $conexion->prepare("DELETE FROM transporte WHERE id=:idTransporte");


	  $usuario->bindParam(":idTransporte", $idTransporte, PDO::PARAM_INT);


      $usuario->execute(); 


 header("location: transporte.php?id=$idViaje");
} else {
header("location: miBubbleTravel.php");
}

?>