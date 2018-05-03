<?php

if(!empty($_POST)) {
	require("/classes/Validate.php");
	$validate = new Validate();
	$validation = $validate->check($_POST, array(
		'nombreusuario' => array(
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
		'confirmarpassword' => array('required' => true, 'matches' => 'password'),
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

if($validation->passed())
{
	include("../funciones/conexion.php");
	$link = conectar();
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$nombreusuario = $_POST['nombreusuario'];
	$email = $_POST['email'];
	$contrasenia = $_POST['password'];
	$recontrasenia = $_POST['confirmarpassword'];
	$foto = $_POST['foto'];
	$rol = $_POST['rol'];
	
	//comprueba que ya no exista ese mail
	$con = "SELECT email FROM usuarios WHERE email = '$email'";
	
	$result = mysqli_query($link,$con);
	$empty= 0;
	if(mysqli_num_rows($result)==0)
	{
		$empty= 1;
	}
	
	if($empty)
	{
		$insertar = "INSERT INTO usuarios (email, nombreusuario,apellido,foto,password,rol) VALUES('$email','$nombreusuario','$apellido','$foto','$contrasenia','$rol')";
		if($link->query($insertar) === TRUE)
		{
			echo "New record created";
		}
		else
		{
			echo "ERROR: " . $insertar ."<br>" .$link->error;
		}
		//mysqli_query($link,$insertar);
		mysqli_close($link);
		header("Location: ../?msg=1");
	}
	else
	{
		header("Location: ../signup.php?msg=2");
	}
}

//No superó la validación
else
{
	header("Location: ../signup.php?msg=3");
}

?>