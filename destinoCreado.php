<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$nombre=$_POST["nombre"];
$fechaInicio=$_POST["fechaInicio"];
$fechaFin=$_POST["fechaFin"];
$idViaje=$_POST["viaje"];
$idUsuario=$_SESSION['Usuario']['id'];



$usuario = $conexion->prepare("INSERT INTO destinos (id_viaje, id_usuario, nombre, fecha_inicio, fecha_fin) VALUES (:idViaje, :idUsuario, :nombre, :fechaInicio, :fechaFin)");

      $usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);
	  $usuario->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
	  $usuario->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);
	  $usuario->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
	$usuario->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);

      $usuario->execute(); 
header("location: destinos.php?id=$idViaje");
} else {
header("location: miBubbleTravel.php");
}

?>