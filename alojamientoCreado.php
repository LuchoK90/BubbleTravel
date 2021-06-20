<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$nombre=$_POST["nombre"];
$fechaInicio=$_POST["fechaInicio"];
$fechaFin=$_POST["fechaFin"];
$destino=$_POST["destino"];
$valor=$_POST["valor"];
$idViaje=$_POST["viaje"];
$idUsuario=$_SESSION['Usuario']['id'];

echo $nombre;
echo $fechaInicio;
echo $fechaFin;
echo $destino;
echo $valor;
echo $idViaje;
echo $idUsuario;

$usuario = $conexion->prepare("INSERT INTO alojamiento (id_viaje, id_usuario, nombre, fecha_inicio, fecha_fin, destino, valor) VALUES (:idViaje, :idUsuario, :nombre, :fechaInicio, :fechaFin, :destino, :valor)");

      $usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);
	  $usuario->bindParam(":valor", $valor, PDO::PARAM_INT);
	  $usuario->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
	  $usuario->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);
	  $usuario->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
	  $usuario->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
	  $usuario->bindParam(":destino", $destino, PDO::PARAM_STR);


      $usuario->execute(); 
header("location: alojamientos.php?id=$idViaje");
} else {
header("location: miBubbleTravel.php");
}

?>