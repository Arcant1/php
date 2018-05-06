<html>
<head>
	<title>Agregar Libro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/usuario.css">
</head>
<body  background="../img/fondo.jpg">
	<div class="header">
		<h1>Agregar Libro</h1>
	</div>

	<form name="Agregar Libro" action="validaciones/validarLibro.php" method="post" role="form" enctype="multipart/form-data">
		<div class="input-group">
			<label>Titulo</label> 
			<input type="text" class="form-control" name="titulo" placeholder="Titulo" id="titulo">
		</div>
		
		
		<div class="input-group">
			<label>Descripcion</label> 
			<input type="text" class="form-control" name="descripcion" placeholder="Descripcion" id="descripcion">
		</div>
		
		<div class="form-group" id="inputImg_g">
			<label for="portada">Cargar Portada</label>
			<input type="file" name="portada" id="portada">
			<span id="inputImg_error"></span>
		</div>

		<div class="input-group">
			<label>Cantidad</label> 
			<input type="number" class="form-control" name="cantidad" placeholder="Cantidad" id="cantidad" min="1">
		</div>
		
		<div class="input-group">
			<button type="submit" value="Submit" name="submit" id="submit" class="btn btn-primary">Agregar</button>
		</div>
	</form>

	<script type="text/javascript" src="js/validarLibro.js"></script>
</div>
</body>
</html>