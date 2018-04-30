<?php
	session_start();
	unset($_SESSION['estado']);
	unset($_SESSION['idUsuario']);
	unset($_SESSION['nombre']);
	unset($_SESSION['apellido']);
	unset($_SESSION['admin']);
	session_destroy();
	header("Location: ../index.php");
?>