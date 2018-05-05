<?php
  session_start();
?>

<html>  
  <head>
    <meta charset="utf-8">
    <title>Signin</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body  background="img/fondo.jpg">
    <?php  
      include_once("header.php");
    ?>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
              <?php
                if(isset($_GET['msg'])){
                  $msg = $_GET['msg'];
                  if($msg==1){
                    echo "<h4 style='color:red;'>Fallo al iniciar sesion</h4>";
                  }
                }
              ?>
            </div>
            <div class="col-xs-5" id="formulario">
              <h4>Signin</h4>
              <br>
              <form name="formulario" class="form-group" action="validaciones/validarInicio.php" method="post">
                  <label for="text">Email:</label>
                  <input type="text" class="form-control" id="email" name="email">
                  <br>
                  <label for="text">Contraseña:</label>
                  <input type="Password" class="form-control" id="password"/  name="password">
                  <br>
                  <input type="submit" class="btn btn-default" value="Send" name="submit" id="submit">
              </form>
              <script type="text/javascript" src="js/validarInicioSesion.js"></script>
            </div>
        </div>
    </div>
    <?php
        include("footer.php");
    ?>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>  
  </body>
</html>