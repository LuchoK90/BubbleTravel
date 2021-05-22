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

   
 <hr class="separador">
      

     
        <div class="container col-md-12">
        <div class="textoRegistro col-md-6"><span>BUBBLE TRAVEL te ayuda a organizar tu viaje con familia, pareja o amigos seleccionando destinos, calculando presupuestos y planificando tu itinerario.</span></div>

        <div class="formulario col-md-5"><span>MI BUBBLE TRAVEL</span>
        <hr class="separador">

        <form action="inicioSesion.php" method="POST">
    
        <input style="width:80%;" type="email" id="email" name="email" placeholder="E-MAIL" required><br>

        <input style="width:80%;" type="password" id="password" name="password" placeholder="PASSWORD" required><br>
     
        <input class="botonFormulario" type="submit" value="INGRESAR">
        </form>

<a class="linkForm" href="registrarse.php">No tengo cuenta, quiero registrarme</a>
        </div>

        </div>  

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
