<?php
  include_once("funciones/conexion.php");
  $link = conectar();
  include_once("clases/comprobar.php");
  $COM = new Comprobacion();
  try {
    $COM->comprobacion();
    $row = $COM->devolverUsuario($link);
    $email = $row['email'];
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $password = $row['password'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
    <?php  
      include_once("header.php");
    ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
            </div>
            <div class="col-xs-5" id="formulario">
              <h4>Profile</h4>
              <br>
              <form name="formulario" action="" method="post">
                   <label for="text">Nombre:</label>
                   <input type="text" class="form-control" id="text" name="Nombre" value='<?php echo $nombre;?>'>
                   <br>
                   <label for="text">Apellido:</label>
                   <input type="text" class="form-control" id="text" name="Apellido" value='<?php echo $apellido;?>'>
                   <br>
                   <label for="email">Email:</label>
                   <input type="email" class="form-control" id="email" name="Email" value='<?php echo $email;?>'>
                   <br>
                   <!--<label for="password">Password:</label>
                   <input type="password" class="form-control" id="password" name="Password" value='<?php echo $password;?>'>
                   <br>-->
                   <!--<label for="Re-password">Re-Password:</label>
                   <input type="password" class="form-control" id="password" name="RePassword" value='<?php echo $password;?>'>
                   <br>-->
                   <!--<button type="submit" class="btn btn-default">Save</button>-->
                   <a class='btn btn-primary' href='/Test/index.php'>Volver</a>
                   <br><br>
               </form>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php
  } catch (Exception $e) {
    mysqli_close($link);
    header("Location: /Test/index.php?msg=2");
  }
?>