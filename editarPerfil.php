<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php"); 
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$email=$_POST["email"];
$nick=$_POST["nick"];
$password=$_POST["password"];
$id=$_SESSION['Usuario']['id'];

$usuario = $conexion->prepare("UPDATE usuario SET nombre = :nombre, apellido = :apellido, mail = :email, nick = :nick, pass = :password  WHERE id = :id");

      $usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);
      $usuario->bindParam(":apellido", $apellido, PDO::PARAM_STR);
      $usuario->bindParam(":email", $email, PDO::PARAM_STR);
      $usuario->bindParam(":nick", $nick, PDO::PARAM_STR);
      $usuario->bindParam(":password", $password, PDO::PARAM_STR);
      $usuario->bindParam(":id", $id, PDO::PARAM_INT);

$_SESSION["Usuario"]["nombre"]=$nombre;
$_SESSION["Usuario"]["apellido"]=$apellido;
$_SESSION["Usuario"]["mail"]=$email;
$_SESSION["Usuario"]["nick"]=$nick;
$_SESSION["Usuario"]["pass"]=$password;

      $usuario->execute(); 

header("location: miPerfil.php");} else {
header("location: miBubbleTravel.php");
}

?>