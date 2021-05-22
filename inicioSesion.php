<?php include("conexion.php"); 

$email=$_POST["email"];
$password=$_POST["password"];

$usuario = $conexion->prepare("SELECT * FROM usuario WHERE mail = :email AND pass = :password");
$usuario->bindParam(":email", $email, PDO::PARAM_STR);
$usuario->bindParam(":password", $password, PDO::PARAM_STR);

$usuario->execute();

if ($usuario->rowCount() == 1){

  session_start();

  $usuario = $usuario->fetch();

        $_SESSION["Usuario"] = array(
        	"id" => $usuario["id"],
          "nombre" => $usuario["nombre"],
          "apellido" => $usuario["apellido"],
          "nick" => $usuario["nick"],
          "mail" => $usuario["mail"],
          "pass" => $usuario["pass"]
        );
 header("location: home.php"); } else {
 	header('Location: errorLogin.php');
 }

?>