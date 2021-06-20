<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$nombre=$_POST["nombre"];
$fecha=$_POST["fechaInicio"];
$valor=$_POST["valor"];
$idExcursion=$_POST["excursion"];
$idViaje=$_POST["viaje"];

$id=$_SESSION['Usuario']['id'];

$usuario = $conexion->prepare("UPDATE excursiones SET nombre = :nombre, fecha = :fecha, valor = :valor WHERE id = :idExcursion");

      $usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);
     $usuario->bindParam(":fecha", $fecha, PDO::PARAM_STR);
      $usuario->bindParam(":valor", $valor, PDO::PARAM_INT);
$usuario->bindParam(":idExcursion", $idExcursion, PDO::PARAM_INT);


      $usuario->execute(); 

header("location: excursiones.php?id=$idViaje");} else {
header("location: miBubbleTravel.php");
}

?>