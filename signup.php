<html>
<head>
	<title>Usuario</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/usuario.css">
</head>
<body  background="../img/fondo.jpg">
	<div class="header">
		<h1>Registro de usuario</h1>
	</div>

	<form name="Registro" action="validaciones/validarRegistro.php" method="post" role="form" enctype="multipart/form-data">
		<div class="input-group">
			<label>Nombre de Usuario</label> 
			<input type="text" class="form-control" name="nombreusuario" placeholder="Nombre de usuario" id="nombreusuario">
		</div>
		<div class="input-group">
			<label>Clave</label>
			<input type="password" class="form-control" placeholder="Ingrese contraseña" name="password" id="password">
		</div>
		<div class="input-group">
			<label>Confirmaci&oacuten de la clave</label>
			<input type="password" class="form-control" placeholder="Repita contraseña" id="confirmarpassword" 
			name="confirmarpassword" autocomplete="new-password">
		</div>
		<div class="input-group">
			<label>Nombre</label> 
			<input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre">
		</div>
		<div class="input-group">
			<label>Apellido</label>
			<input type="text" class="form-control" name="apellido" placeholder="Apellido" id="apellido">
		</div>

		<div class="input-group">
			<label>Rol</label>
			<input list="browsers" class="form-control" name="rol" placeholder="Rol" id="rol">
			<datalist id="browsers">
				<option value='LECTOR'>
					<option value='BIBLIOTECARIO'>
					</datalist>
				</div>

				 <div class="form-group" id="inputImg_g">
              <label for="foto">Cargar imagen</label>
              <input type="file" name="foto" id="foto">
              <span id="inputImg_error"></span>
            </div>

				<div class="input-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" id="email" value="" placeholder="Email" value="<?php echo $email; ?>">
				</div>

				<div class="input-group">
					<button type="submit" value="Submit" name="submit" id="submit" class="btn btn-primary">Registrarse</button>
				</div>
			</form>

			<script type="text/javascript" src="js/validarUser.js"></script>
		</div>
	</body>
	</html>