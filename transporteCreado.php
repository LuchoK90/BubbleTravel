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
$idViaje=$_POST["viaje"];
$idUsuario=$_SESSION['Usuario']['id'];

echo $nombre;
echo $fechaInicio;
echo $fechaFin;
echo $lugarOrigen;
echo $lugarDestino;
echo $medio;
echo $valor;
echo $idViaje;
echo $idUsuario;

$usuario = $conexion->prepare("INSERT INTO transporte (id_viaje, id_usuario, nombre, fecha_inicio, fecha_fin, lugar_origen, lugar_fin, medio, valor) VALUES (:idViaje, :idUsuario, :nombre, :fechaInicio, :fechaFin, :lugarOrigen, :lugarDestino, :medio, :valor)");

      $usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);
	  $usuario->bindParam(":valor", $valor, PDO::PARAM_INT);
	  $usuario->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
	  $usuario->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);
	  $usuario->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
	  $usuario->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
	  $usuario->bindParam(":lugarOrigen", $lugarOrigen, PDO::PARAM_STR);
	  $usuario->bindParam(":lugarDestino", $lugarDestino, PDO::PARAM_STR);
	  $usuario->bindParam(":medio", $medio, PDO::PARAM_STR);

      $usuario->execute(); 
header("location: transporte.php?id=$idViaje");
} else {
header("location: miBubbleTravel.php");
}

?>