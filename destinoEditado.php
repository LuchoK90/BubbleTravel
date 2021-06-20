<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$nombre=$_POST["nombre"];
$fechaInicio=$_POST["fechaInicio"];
$fechaFin=$_POST["fechaFin"];

$idDestino=$_POST["destino"];
$idViaje=$_POST["viaje"];

$id=$_SESSION['Usuario']['id'];

$usuario = $conexion->prepare("UPDATE destinos SET nombre = :nombre, fecha_inicio = :fechaInicio, fecha_fin = :fechaFin WHERE id = :idDestino");

      $usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);
     $usuario->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
$usuario->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
$usuario->bindParam(":idDestino", $idDestino, PDO::PARAM_INT);


      $usuario->execute(); 

header("location: destinos.php?id=$idViaje");} else {
header("location: miBubbleTravel.php");
}

?>