<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$nombre=$_POST["nombre"];
$fechaInicio=$_POST["fechaInicio"];
$valor=$_POST["valor"];
$idViaje=$_POST["viaje"];
$idUsuario=$_SESSION['Usuario']['id'];

echo $nombre;
echo $fechaInicio;
echo $valor;
echo $idViaje;
echo $idUsuario;

$usuario = $conexion->prepare("INSERT INTO excursiones (id_viaje, id_usuario, nombre, fecha, valor) VALUES (:idViaje, :idUsuario, :nombre, :fechaInicio, :valor)");

      $usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);
	  $usuario->bindParam(":valor", $valor, PDO::PARAM_INT);
	  $usuario->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
	  $usuario->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);
	  $usuario->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);

      $usuario->execute(); 
header("location: excursiones.php?id=$idViaje");
} else {
header("location: miBubbleTravel.php");
}

?>