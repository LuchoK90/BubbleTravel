<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$nombre=$_POST["nombre"];
$presupuesto=$_POST["presupuesto"];
$idViajero=$_POST["viajero"];

$id=$_SESSION['Usuario']['id'];

$usuario = $conexion->prepare("UPDATE viajeros SET nombre = :nombre, presupuesto = :presupuesto WHERE id = :idViajero");

      $usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);

      $usuario->bindParam(":presupuesto", $presupuesto, PDO::PARAM_INT);
$usuario->bindParam(":idViajero", $idViajero, PDO::PARAM_INT);


      $usuario->execute(); 

header("location: editarViajero.php?idVi=$idViajero");} else {
header("location: miBubbleTravel.php");
}

?>