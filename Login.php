<!DOCTYPE html>
<html lang="es">
<head>
  <title>Iniciar sesión</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 </head>
<body>
  <div class="container">
    <form class="form-signin">
      <h2 class="form-signin-heading">Ingrese sus datos</h2>
      <label for="inputUsername" class="sr-only">Nombre de usuario</label>
      <input type="username" id="inputUsername" class="form-control" placeholder="Nombre de usuario" required autofocus>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
      <div class="checkbox">
        <label>
          <input type="checkbox" value="remember-me"> Recuerdame
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
    </form>
  </div>
</body>
</html>