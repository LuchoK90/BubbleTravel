<?php
session_start();
if ( isset( $_SESSION["Usuario"] ) ) {
include("conexion.php");
$idUsuario=$_SESSION['Usuario']['id']; 

$idViaje=$_GET["id"];

@$busqueda=$_POST["busqueda"];



$viaje = $conexion->prepare("SELECT nombre FROM viaje WHERE id=:idViaje");


    $viaje->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);


      $viaje->execute(); 

       $viaje = $viaje->fetch()

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

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="imagenes/vnd.microsoft.icon" href="imagenes/icono.ico">

    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  text-align: center;
}

td, th {
  border: 1px solid #0C4B8F;;
  text-align: center;
  padding: 8px;

}

tr:nth-child(odd) {
  background-color: #dddddda8;
}
</style>

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
      <li class="nav-item ">
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

          <div class="contenedorFormularioSubir col-md-12">
          <h3 class="col-md-12"><i class="fas fa-vote-yea"></i> VOTACIÓN DE DESTINOS PARA <?php echo strtoupper($viaje["nombre"]); ?></h3><br>

          <div class="col-md-12">

    <?php
$destinos = $conexion->prepare("SELECT destino, COUNT(id) AS cantidadVotos FROM votos WHERE id_usuario=:idUsuario AND id_viaje=:idViaje GROUP BY destino ORDER BY cantidadVotos DESC");
      $destinos->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
      $destinos->bindParam(":idViaje", $idViaje, PDO::PARAM_INT);
      $destinos->execute();
    ?>

     <table>
  <tr style="background-color: #dedafb52;">
    <th>#</th>
    <th>DESTINO</th>
    <th>VOTOS</th>
  </tr>
<?php $posicion=0; ?>
  <?php while ( $destino = $destinos->fetch() ) { $posicion=$posicion+1; ?>
  <tr>
    <td><?php echo $posicion; ?></td>
    <td><?php echo $destino["destino"]; ?></td>
    <td><?php echo $destino["cantidadVotos"]; ?></td>
  </tr>
  <?php } ?>
</table>

        </div>

        </div> 
<a href="destinos.php?id=<?php echo $idViaje; ?>"><button type="button" class="col-md-12 btn btn-secondary botonSubirEstudio" style="margin-right: 10px!important;">VOLVER A DESTINOS</button></a> 
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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
   

    <script type="text/javascript">
      $("#file-1").fileinput({
    theme: 'fa',
    uploadUrl: '#',
    allowedFileExtensions: ['jpg', 'png', 'pdf','doc'],
    overwriteInitial: false,
    maxFileSize:2000,
    maxFilesNum: 10,
    slugCallback: function (filename) {
        return filename.replace('(', '_').replace(']', '_');
    }
});
    </script>

  </body>
</html>