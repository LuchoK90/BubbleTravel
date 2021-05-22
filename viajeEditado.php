<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$nombre=$_POST["nombre"];
$presupuesto=$_POST["presupuesto"];
$idViaje=$_POST["id"];

$id=$_SESSION['Usuario']['id'];

$usuario = $conexion->prepare("UPDATE viaje SET nombre = :nombre, presupuesto = :presupuesto WHERE id = :idViaje");

      $usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);
     $usuario->bindParam(":presupuesto", $presupuesto, PDO::PARAM_INT);
      $usuario->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);



      $usuario->execute(); 

header("location: editarViaje.php?id=$idViaje");} else {
header("location: miBubbleTravel.php");
}

?>