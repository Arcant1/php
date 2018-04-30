<html>
<head>
  <title>Usuario</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/usuario.css">
</head>
<body>
  
  <div class="header">
    <h1>Registro de usuario</h1>
  </div>
  <form name="Registro" action="validaciones/validarRegistro.php" method="POST">
    <div class="input-group">
      <label>Nombre de Usuario</label> 
      <input type="text" class="form-control" name="nombreusuario" placeholder="Nombre de usuario">
    </div>
    <div class="input-group">
      <label>Clave</label>
      <input type="password" class="form-control" placeholder="Ingrese contraseña" name="password">
    </div>
    <div class="input-group">
      <label>Confirmaci&oacuten de la clave</label>
      <input type="password" class="form-control" placeholder="Repita contraseña" 
      name="confirmarpassword" autocomplete="new-password">
    </div>
    <div class="input-group">
      <label>Nombre</label> 
      <input type="text" class="form-control" name="nombre" placeholder="Nombre">
    </div>
    <div class="input-group">
      <label>Apellido</label>
      <input type="text" class="form-control" name="apellido" placeholder="Apellido">
    </div>
    <div class="input-group">
      <label>Rol</label>
      <input list="browsers" class="form-control" name="rol" placeholder="Rol">
      <datalist id="browsers">
        <option value='LECTOR'>
        <option value='BIBLIOTECARIO'>
      </datalist>
    </div>
    <div class="input-group">
      <label>Foto</label>
      <input type="file" class="form-control-file" name="foto" accept="image/*">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" class="form-control" name="email" value="" placeholder="Email" value="<?php echo $email; ?>">
    </div>

    <div class="input-group">
      <button type="submit" value="Submit" class="btn btn-primary">Registrarse</button>
    </div>
  </form>
</div>
</body>
</html>