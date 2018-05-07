<?php
	session_start();
	include("funciones/conexion.php");
	$link = conectar();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Libroteca</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="css/index.css" rel="stylesheet">
</head>
<body background="../img/fondo.jpg">
	<?php
		include("header.php");
	?>
	<div class="container-fluid">
		<div class="container-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-lg-3" align="center">
						<img class="img-circle img-responsive" src="img/logo.jpg" height="250" width="250">
					</div>
					<div class="col-md-3 col-lg-3"></div>
					<div class="col-md-4 col-lg-4" style="background-color: grey">
						<form>
							<fieldset class="form-group">
								<legend><b>Refinar b&uacutesqueda</b></legend>
								<br>
								<label>T&iacutetulo</label>
								<input type="text" class="form-control" name="autor">
								<br>
								<br>
								<label>Autor</label> <input type="text" class="form-control" name="libro">
								<button type="submit" class=" btn btn-primary">Enviar</button>
							</fieldset>
						</form>
					</div>
				</div>
				<br>


				<h3 style="background-color: lightblue"> <b><ins><i>Cat&aacutelogo de libros</i></ins></b> </h3>
				<div id="div1" class="#div1" style="background-color: lightblue">
					<table style="width:100%" id="myTable">
						<tr>
							<th>
								Portada
							</th>
							<th onclick="sortTable(1)" style="cursor: pointer;">
								T&iacutetulo
							</th>
							<th onclick="sortTable(2)" style="cursor: pointer;">
								Autor
							</th>
							<th>
								Ejemplares
							</th>
						</tr>
						<tr>
							<td>
								<div align="center">
									<img src="img/professional php.jpg" height="250" width="220">
								</div>
							</td>
							<td>
								<a href="lala.html"><ins>Professional PHP Design Pattenrs</ins></a>
							</td>
							<td>
								<a href="leee.html"><ins>Aaron Saray</ins></a>
							</td>
							<td>
								5 (1 disponible - 3 Prestados - 1 reservado)
							</td>
						</tr>
						<tr>
							<td>
								<div align="center">	
									<img src="img/Ingenieria de software.jpg" height="250" width="220">
								</div>
							</td>
							<td>
								<a href="lela.html"><ins>Ingenieria de Software</ins></a>
							</td>
							<td>
								<a href="leeo.html"><ins>Guillermo Pantaleo</ins></a>
							</td>
							<td>
								3 (2 disponibles - 1 prestado)
							</td>
						</tr>
						<tr>
							<td>
								<div align="center">
									<img src="img/Ingenieria de software 1.jpg" height="250" width="220">
								</div>
							</td>
							<td>
								<a href="lela.html"><ins>Ingenieria de Software</ins></a>
							</td>
							<td>
								<a href="leeo.html"><ins>Ian Sommerville</ins></a>
							</td>
							<td>
								3 (3 disponibles)
							</td>
						</tr>
						<tr>
							<td>
								<div align="center">
									<img src="img/Ingenieria de software 2.jpg" height="250" width="220">
								</div>
							</td>
							<td>
								<a href="lela.html"><ins>Ingenieria del Software</ins></a>
							</td>
							<td>
								<a href="leeo.html"><ins>Roger Pressman</ins></a>
							</td>
							<td>
								4 (2 disponibles - 2 reservados)
							</td>
						</tr>
						<tr>
							<td>
								<div align="center">
									<img src="img/Ingenieria de software 3.jpg" height="250" width="220">
								</div>
							</td>
							<td>
								<a href="lela.html"><ins>Ingenieria del software-Septima edicion</ins></a>
							</td>
							<td>
								<a href="leeo.html"><ins>Roger S. Pressman</ins></a>
							</td>
							<td>
								2 (1 reservado - 1 prestado)
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
	<div class="container">
		<div class="btn-group btn-group-justified">
			<a href="index.html" class="btn btn-primary">Primera P&aacutegina</a>
			<a href="javascript:history.go(-1)" class="btn btn-primary">P&aacutegina Anterior</a>
			<a href="javascript:history.go(1)" class="btn btn-primary">P&aacutegina Siguiente</a>
			<a href="index.html" class="btn btn-primary">&Uacuteltima P&aacutegina</a>
		</div>
	</div>
	<?php
	include ("footer.php");
	?>
</body>
</html>>
