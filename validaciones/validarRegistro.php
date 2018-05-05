<?php

if(!empty($_POST)) {
	require("../classes/Validate.php");
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
	$error="";
	$fail=false;
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$nombreusuario = $_POST['nombreusuario'];
	$email = $_POST['email'];
	$contrasenia = $_POST['password'];
	$recontrasenia = $_POST['confirmarpassword'];
	//$foto = $_POST['foto'];
	

   //cargar imagen
	$target_dir = "../";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        	$tmpName = $_FILES["fileToUpload"]["tmp_name"];
			$fp = fopen($tmpName, 'r');
			$contenidoImagen = fread($fp, filesize($tmpName));
			$contenidoImagen = addslashes($contenidoImagen);
			fclose($fp);

    } else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
}

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
 	/*ver esto agregado por BOB
 	$insertar="INSERT INTO `usuarios` VALUES ( NULL , '$email','$nombreUsuario', '$nombre', '$apellido','$contenidoImagen','$contrasenia','$rol')";
    */
 	$insertar = "INSERT INTO usuarios(email,nombreusuario,nombre,apellido,foto,password,rol)VALUES('$email','$nombreusuario','$nombre','$apellido','$contenidoImagen','$contrasenia','$rol')";
 	echo $insertar;
 	mysqli_query($link,$insertar);

 	mysqli_close($link);
	//header("Location: ../?msg=1");
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