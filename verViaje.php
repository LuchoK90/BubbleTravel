<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php");
$idUsuario=$_SESSION['Usuario']['id']; 

$idViaje=$_GET["id"];

$viaje = $conexion->prepare("SELECT nombre FROM viaje WHERE id=:idViaje");


    $viaje->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);


      $viaje->execute(); 

       $viaje = $viaje->fetch();

$dias = $conexion->prepare("SELECT min(fecha_inicio) AS salida, max(fecha_fin) AS llegada, TIMESTAMPDIFF(DAY, min(fecha_inicio),max(fecha_fin)) AS dias, SUM(valor) AS valorTransporte FROM transporte WHERE id_viaje=:idViaje");


    $dias->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);


      $dias->execute(); 

       $dias = $dias->fetch();

$destinos = $conexion->prepare("SELECT count(*) AS cantidad FROM destinos WHERE id_viaje=:idViaje");


    $destinos->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);


      $destinos->execute(); 

       $destinos = $destinos->fetch();

$viajeros = $conexion->prepare("SELECT count(*) AS cantidad, SUM(presupuesto) AS presupuesto_total FROM viajeros WHERE id_viaje=:idViaje");


    $viajeros->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);


      $viajeros->execute(); 

       $viajeros = $viajeros->fetch();

@$presupuestoPromedio=$viajeros["presupuesto_total"]/$viajeros["cantidad"];


$presupuestoAlojamiento = $conexion->prepare("SELECT SUM(valor) AS valorAlojamiento FROM alojamiento WHERE id_viaje=:idViaje");


    $presupuestoAlojamiento->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);


      $presupuestoAlojamiento->execute(); 

       $presupuestoAlojamiento = $presupuestoAlojamiento->fetch();

$presupuestoExcursiones = $conexion->prepare("SELECT SUM(valor) AS valorExcursion FROM excursiones WHERE id_viaje=:idViaje");


    $presupuestoExcursiones->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);


      $presupuestoExcursiones->execute(); 

       $presupuestoExcursiones = $presupuestoExcursiones->fetch();

@$presupuestoPromedioUtilizado=($dias["valorTransporte"]+$presupuestoExcursiones["valorExcursion"]+$presupuestoAlojamiento["valorAlojamiento"])/$viajeros["cantidad"];

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
      <li class="nav-item">
        <a class="nav-link" href="misViajes.php">Mis Viajes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="crearViaje.php">Crear un Viaje</a>
      </li>
      
    </ul>
    <div class="dropdown">
 <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    ¡HOLA  <?php echo strtoupper($_SESSION["Usuario"]["nick"]); ?>! &nbsp; &nbsp; &nbsp; <i class="fas fa-user"></i>
  </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="miPerfil.php">Ver Perfil</a>
    <hr>
    <a class="dropdown-item" href="cerrarSesion.php">Cerrar Sesión</a>
  </div>
</div>
  </div>
</nav>  

   
 <hr class="separador" style="margin-top: 0;">
      

        <div class="container col-md-12">
 <h1 class="col-md-12" style="text-align: center;"><?php echo strtoupper($viaje["nombre"]); ?></h1><br>
        <a href="transporte.php?id=<?php echo $idViaje; ?>"> <div class="botonHome col-md-3">
         <i class="fas fa-plane"></i><br>
          TRANSPORTE
        </div> </a>

<div class="espacio col-md-1"></div>

         <a href="destinos.php?id=<?php echo $idViaje; ?>"><div class="botonHome col-md-3">
          <i class="fas fa-map-marker-alt"></i><br>
          DESTINOS
        </div> </a>

<div class="espacio col-md-1"></div>

        <a href="alojamientos.php?id=<?php echo $idViaje; ?>"><div class="botonHome col-md-3">
         <i class="fas fa-concierge-bell"></i><br>
          ALOJAMIENTOS
        </div> </a>

  <div class="espacio col-md-2"></div>


         <a href="viajeros.php?id=<?php echo $idViaje; ?>"><div class="botonHome col-md-3">
          <i class="fas fa-users"></i><br>
          VIAJEROS
        </div> </a>

<div class="espacio col-md-2"></div>

         <a href="excursiones.php?id=<?php echo $idViaje; ?>"><div class="botonHome col-md-3">
          <i class="fas fa-bus"></i><br>
          EXCURSIONES
        </div> </a>
<div class="espacio col-md-2"></div>

<?php 

        $fecha_inicio = strtotime($dias["salida"]);
        $fecha_inicio = date("d-m-Y", $fecha_inicio);

        $fecha_fin = strtotime($dias["llegada"]);
        $fecha_fin = date("d-m-Y", $fecha_fin);

?>

<div class="contenedorResumenViaje col-md-12">
  <h2><b>RESUMEN</b></h2>
<p><b>DÍAS TOTALES: </b><?php echo $dias["dias"]; ?></p>
<p><b>FECHA DE SALIDA: </b><?php echo $fecha_inicio; ?></p>
<p><b>FECHA DE LLEGADA: </b><?php echo $fecha_fin; ?></p>
<p><b>CANTIDAD DE DESTINOS: </b><?php echo $destinos["cantidad"]; ?></p>
<p><b>CANTIDAD DE VIAJEROS: </b><?php echo $viajeros["cantidad"]; ?></p>
<p <?php if ($presupuestoPromedioUtilizado > $presupuestoPromedio){ ?> style="color:red;" <?php } ?> ><b>PROMEDIO UTILIZADO / PROMEDIO DISPONIBLE: </b>$ <?php echo number_format($presupuestoPromedioUtilizado, 2, '.', '');  ?> / $ <?php echo number_format($presupuestoPromedio, 2, '.', '');  ?></p>
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