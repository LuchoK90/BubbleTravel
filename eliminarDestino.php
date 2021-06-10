<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$idDestino=$_GET["idD"];
$idViaje=$_GET["idV"];

 $usuario = $conexion->prepare("DELETE FROM destinos WHERE id=:idDestino");


	  $usuario->bindParam(":idDestino", $idDestino, PDO::PARAM_INT);


      $usuario->execute(); 


 header("location: destinos.php?id=$idViaje");
} else {
header("location: miBubbleTravel.php");
}

?>