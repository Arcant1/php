<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Iniciar sesión</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/usuario.css">
</head>
<body background="../img/fondo.jpg">
  <div class="header">
    <h1>Ingrese sus datos</h1>
  </div>
  <form name="Inicio sesión" method="POST">
    <div class="input-group">
      <label>Nombre de Usuario</label>
      <input type="text" id="inputUsername" class="form-control" placeholder="Nombre de usuario" value="">
    </div>
    <div class="input-group">
      <label>Contraseña</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña">
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Recuerdame
      </label>
    </div>
    <div class="input-group">
      <button class="btn btn-primary" type="submit">Iniciar sesión</button>
    </div>
  </form>
  <?php
  include("footer.php");
  ?>
</body>
</html>