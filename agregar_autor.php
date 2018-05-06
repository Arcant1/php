<html>
<head>
	<title>Agregar Autor</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/usuario.css">
</head>
<body  background="../img/fondo.jpg">
	<div class="header">
		<h1>Agregar Autor</h1>
	</div>

	<form name="Agregar Libro" action="validaciones/validarAutor.php" method="post" role="form" enctype="multipart/form-data">
		<div class="input-group">
			<label>Apellido</label> 
			<input type="text" class="form-control" name="apellido" placeholder="Apellido" id="apellido">
		</div>
		
		
		<div class="input-group">
			<label>Nombre</label> 
			<input type="text" class="form-control" name="nombre" placeholder="nombre" id="nombre">
		</div>
		
				
		<div class="input-group">
			<button type="submit" value="Submit" name="submit" id="submit" class="btn btn-primary">Agregar Autor</button>
		</div>
	</form>

	<script type="text/javascript" src="js/validarAutor.js"></script>
</div>
</body>
</html>