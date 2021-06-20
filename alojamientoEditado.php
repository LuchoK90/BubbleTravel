<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 

$nombre=$_POST["nombre"];
$fechaInicio=$_POST["fechaInicio"];
$fechaFin=$_POST["fechaFin"];
$destino=$_POST["destino"];
$valor=$_POST["valor"];
$idAlojamiento=$_POST["alojamiento"];
$idViaje=$_POST["viaje"];

$id=$_SESSION['Usuario']['id'];

$usuario = $conexion->prepare("UPDATE alojamiento SET nombre = :nombre, fecha_inicio = :fechaInicio, fecha_fin = :fechaFin, destino = :destino, valor = :valor WHERE id = :idAlojamiento");

      $usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);
     $usuario->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
     $usuario->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
     $usuario->bindParam(":destino", $destino, PDO::PARAM_STR);
      $usuario->bindParam(":valor", $valor, PDO::PARAM_INT);
$usuario->bindParam(":idAlojamiento", $idAlojamiento, PDO::PARAM_INT);


      $usuario->execute(); 

header("location: alojamientos.php?id=$idViaje");} else {
header("location: miBubbleTravel.php");
}

?>