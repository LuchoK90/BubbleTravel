<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$nombre=$_POST["nombre"];
$presupuesto=$_POST["presupuesto"];
$idUsuario=$_SESSION['Usuario']['id'];

$usuario = $conexion->prepare("INSERT INTO viaje (id_usuario, nombre, presupuesto) VALUES (:idUsuario, :nombre, :presupuesto)");

      $usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);
	  $usuario->bindParam(":presupuesto", $presupuesto, PDO::PARAM_INT);
	  $usuario->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);


      $usuario->execute(); 
header("location: misViajes.php");
} else {
header("location: miBubbleTravel.php");
}

?>