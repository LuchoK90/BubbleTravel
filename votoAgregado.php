<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 

$votoViajero=$_POST["votoViajero"];
$votoDestino=$_POST["votoDestino"];
$idViaje=$_POST["viaje"];
$idUsuario=$_SESSION['Usuario']['id'];

$usuario = $conexion->prepare("INSERT INTO votos (id_viaje, id_usuario, destino, viajero) VALUES (:idViaje, :idUsuario, :votoDestino, :votoViajero)");

      
	  $usuario->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
	  $usuario->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);
	  $usuario->bindParam(":votoDestino", $votoDestino, PDO::PARAM_STR);
	  $usuario->bindParam(":votoViajero", $votoViajero, PDO::PARAM_STR);


      $usuario->execute(); 
header("location: votacionDestinos.php?id=$idViaje");
} else {
header("location: miBubbleTravel.php");
}

?>