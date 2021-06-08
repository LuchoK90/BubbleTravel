<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 

$nombre=$_POST["nombre"];
$presupuesto=$_POST["presupuesto"];
$idViaje=$_POST["viaje"];
$idUsuario=$_SESSION['Usuario']['id'];

echo $nombre;
echo $presupuesto;
echo $idViaje;
echo $idUsuario;

$usuario = $conexion->prepare("INSERT INTO viajeros (id_viaje, id_usuario, nombre, presupuesto) VALUES (:idViaje, :idUsuario, :nombre, :presupuesto)");

      $usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);
	  $usuario->bindParam(":presupuesto", $presupuesto, PDO::PARAM_INT);
	  $usuario->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
	  $usuario->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);


      $usuario->execute(); 
header("location: viajeros.php?id=$idViaje"); 
} else {
header("location: miBubbleTravel.php");
}

?>