<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php");
$idUsuario=$_SESSION['Usuario']['id']; 

@$busqueda=$_POST["busqueda"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon-1.ico" type="image/x-icon">
      <title>Bubble Travel</title>

    <!-- Bootstrap -->
       
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">

    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="imagenes/vnd.microsoft.icon" href="imagenes/icono.ico">

     


  </head>

  <body>

  <!--========================================================
                            HEADER
  =========================================================-->
   <header class="header col-md-12" >  
    <div class="espacio col-md-4"></div>
   <img class="logo col-md-4" src="imagenes/logo-bubbletravel.jpg">
    <div class="espacio col-md-4"></div>
      
    </header>
   
  <!--========================================================
                            CONTENT
  =========================================================-->

    <main class="col-md-12"> 

    <nav  class="navbar sticky-top navbar-expand-lg navbar-light bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="misViajes.php">Mis Viajes</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="crearViaje.php">Crear un Viaje</a>
      </li>
      
    </ul>
    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    ??HOLA  <?php echo strtoupper($_SESSION["Usuario"]["nick"]); ?>! &nbsp; &nbsp; &nbsp; <i class="fas fa-user"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="miPerfil.php">Ver Perfil</a>
    <hr>
    <a class="dropdown-item" href="cerrarSesion.php">Cerrar Sesi??n</a>
  </div>
</div>
  </div>
</nav>  

   
 <hr class="separador" style="margin-top: 0;">
      

        <div class="container col-md-12">
<div class="col-md-12 panelEstudios">
<a style="float: right; text-align: center; text-decoration: none; height: 30px;" class="botonFormularioSubir col-md-2" href="misViajes.php">Mostrar Todos</a>

 <form action="misViajes.php" method="POST">
            <div class="col-md-6" style="float: right;">
           <input style="float: right;" class="botonFormularioSubir col-md-4" data-dismiss="modal" type="submit" value="Buscar">

           <input style="float: right;     margin-right: 10px; height: 30px; margin-top: 10px;" class="inputSubir col-md-7" type="text" id="busqueda" name="busqueda" required>
   		   
			</div>
        </form>

</div>
          <div id="accordion">
            <?php

if ( isset( $busqueda ) ){

      $viajes = $conexion->prepare("SELECT * FROM viaje WHERE id_usuario=:idUsuario AND nombre LIKE CONCAT ('%', :busqueda, '%')");
      $viajes->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
      $viajes->bindParam(":busqueda", $busqueda, PDO::PARAM_STR);
      $viajes->execute(); }else{

      $viajes = $conexion->prepare("SELECT * FROM viaje WHERE id_usuario=:idUsuario");
      $viajes->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
      $viajes->execute();

      }

      while ( $viaje = $viajes->fetch() ) {
    ?>
    <div class="card">
      <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapse<?php echo $viaje["id"]; ?>">
          <?php echo $viaje["nombre"]; ?>
        </a>
        
        
         
         <a class="card-link iconCard"  href="eliminarViaje.php?id=<?php echo $viaje['id']; ?>">
          <i class="fas fa-trash-alt"></i> ELIMINAR
        </a>

         <a class="card-link iconCard"  href="editarViaje.php?id=<?php echo $viaje['id']; ?>">
          <i class="fas fa-pencil-ruler"></i> VER / EDITAR
        </a>
        
        <a class="card-link iconCard"  href="verViaje.php?id=<?php echo $viaje['id']; ?>">
          <i class="far fa-eye"></i> DETALLAR
        </a>
      </div>
      <div id="collapse<?php echo $viaje["id"]; ?>" class="collapse" data-parent="#accordion">
        <div class="card-body">

<?php 

$idViaje=$viaje['id'];
    $dias = $conexion->prepare("SELECT min(fecha_inicio) AS salida, TIMESTAMPDIFF(DAY, min(fecha_inicio),max(fecha_fin)) AS dias FROM transporte WHERE id_viaje=:idViaje");


    $dias->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);


      $dias->execute(); 

       $dias = $dias->fetch();

       if($dias["salida"]!=NULL){

       $fecha_inicio = strtotime($dias["salida"]);
       $fecha_inicio = date("d-m-Y", $fecha_inicio);

     }else{
      $fecha_inicio="---";
     }

     $viajeros = $conexion->prepare("SELECT count(*) AS cantidad FROM viajeros WHERE id_viaje=:idViaje");


    $viajeros->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);


      $viajeros->execute(); 

       $viajeros = $viajeros->fetch();
        

?>

          <span class="col-md-4 texto-card-body"><b><i class="far fa-calendar-alt"></i> SALIDA:</b> <?php  echo $fecha_inicio; ?></span>  <span class="col-md-4 texto-card-body"><b><i class="fas fa-tasks"></i> CANTIDAD DE D??AS:</b> <?php echo $dias["dias"]; ?></span> <span class="col-md-4 texto-card-body"><b><i class="fas fa-users"></i> CANTIDAD DE VIAJEROS:</b> <?php echo $viajeros["cantidad"]; ?></span>
        </div>
      </div>
    </div><br>
<?php } ?>
  </div>


 </div>  
   <?php } else { header('Location: miBubbleTravel.php'); } ?> 
</main>


    <!--========================================================
                            FOOTER
  =========================================================-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->         
    <script src="js/bootstrap.min.js"></script>
 <script src="js/tm-scripts.js"></script>    


  <!-- </script> -->


  </body>
</html>