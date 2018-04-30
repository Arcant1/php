<?php
if(!empty($_POST)) {
	require("classes/validate_user.php");
	$validate = new Validate();
	$validation = $validate->check($_POST, array(
		'nombreUsuario' => array(
			'required' => true,
			'length_min' => 3,
			'length_max' => 20,
			'alphanumeric' => true,
			'blacklist' => array(
				'administrator',
				'root',
				'tux')
		),
		'password' => array('required' => true, 'length_min' => 8),
		'confirmarPassword' => array('required' => true, 'matches' => 'password'),
		'nombre' => array('required' => true, 'alphabetic' => true, 'length_max' => 30),
		'apellido' => array('required' => true, 'alphabetic' => true, 'length_max' => 20),
		'email' => array('required' => true, 'mailcheck' => true)
	));
	if($validation->passed()) {
		echo 'Validation passed!';
	}
	else {
		echo '<b>Error:</b>';
		echo '<ul>';
		foreach($validation->errors() as $error)
		{
			echo '<li>'.ucfirst($error).'</li>';
		}
		echo '</ul>';
	}
}
?>

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
			<input type="text" class="form-control" name="nombreUsuario" placeholder="Nombre de usuario" value="">
		</div>
		<div class="input-group">
			<label>Clave</label>
			<input type="password" class="form-control" placeholder="Ingrese contraseña" name="password">
		</div>
		<div class="input-group">
			<label>Confirmaci&oacuten de la clave</label>
			<input type="password" class="form-control" placeholder="Repita contraseña" name="confirmarPassword" autocomplete="new-password">
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
			<label>Foto</label>
			<input type="file" class="form-control-file" name="Foto" accept="image/*">
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