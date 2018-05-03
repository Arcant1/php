<?php 
    include("../funciones/conexion.php");
    include("../clases/comprobar.php");
    
    $link = conectar();
    $email = $_POST['email'];
  	$contraseña = $_POST['password'];

  	$COM = new Comprobacion();
  	
  	try{

	    $COM->log($link,$email,$contraseña);
	    mysqli_close($link);
	    header("Location: ../index.php?msg=1");

	  }catch(Exception $e){
	    mysqli_close($link);
	    header("Location: ../signin.php?msg=1");
	  }
?>

