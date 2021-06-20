<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 

$nombre=$_POST["nombre"];
$fechaInicio=$_POST["fechaInicio"];
$fechaFin=$_POST["fechaFin"];
$lugarOrigen=$_POST["lugarOrigen"];
$lugarDestino=$_POST["lugarDestino"];
$medio=$_POST["medio"];
$valor=$_POST["valor"];
$idTransporte=$_POST["transporte"];
$idViaje=$_POST["viaje"];

$id=$_SESSION['Usuario']['id'];

$usuario = $conexion->prepare("UPDATE transporte SET nombre = :nombre, fecha_inicio = :fechaInicio, fecha_fin = :fechaFin, lugar_origen = :lugarOrigen, lugar_fin = :lugarDestino, medio = :medio, valor = :valor WHERE id = :idTransporte");

      $usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);
     $usuario->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
     $usuario->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
     $usuario->bindParam(":lugarOrigen", $lugarOrigen, PDO::PARAM_STR);
     $usuario->bindParam(":lugarDestino", $lugarDestino, PDO::PARAM_STR);
     $usuario->bindParam(":medio", $medio, PDO::PARAM_STR);
      $usuario->bindParam(":valor", $valor, PDO::PARAM_INT);
$usuario->bindParam(":idTransporte", $idTransporte, PDO::PARAM_INT);


      $usuario->execute(); 

header("location: transporte.php?id=$idViaje");} else {
header("location: miBubbleTravel.php");
}

?>