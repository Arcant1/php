<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/usuario.css">
<?php
//iniciar la sesion
require_once 'access.php';
// validacion de permisos de acceso
$A = new Access;
try {
	$A->accessPermission(ACCESS_PUBLIC);
} catch (Exception $e) {
	$A->accessDenied();
}
// generador de header, buscador y footer
require_once 'generate.php';

?>
<!DOCTYPE html>
<html lang="es">
<?php
generate_head("Ingresar", "login");
?>
<body>

	<?php

	if($A->accessInfo()){
		$path=$_SESSION['access_page'];
	}else{
		$path="";
	}
	?>

	<?php
	if(isset($_GET['alert'])){
		$alert = $_GET['alert'];
		if($alert == "rec"){ ?>
		<section class="container rec-alert">
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-info alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Listo!</strong> Se le envio un mail con una contraseña nueva. Si no lo recibió <a href="recovery.php" class="alert-link">vuelva a intentarlo</a>.
					</div>
				</div>
			</div>
		</section>
		<?php }
		if($alert == "reg"){ ?>
		<section class="container rec-alert">
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-info alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Listo!</strong> Se registró correctamente, ya puede ingresar con su nuevo usuario.
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
?>

<section class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="header">
				<h1>Acceso de usuario</h1>
			</div>
			<form onsubmit="return validateForm_log()" action="loguearUsuario.php" method="post" role="form" class="form-horizontal">
				<input name="path" value="<?php echo $path;?>" type="hidden">
				<?php
				$fail_e = false;
				$fail_p = false;
				$log = "";
				if(isset($_GET['log'])){
					$log = $_GET['log'];
				}
				if($log == "fail-e"){
					$fail_e = true; ?>
					<div class="form-group has-error has-feedback" id="inputEmail_g">
						<label for="inputEmail" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
							<span id="inputEmail_error"><span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span></span>
						</div>
					</div>
					<?php
				}else{
					?>
					<div class="form-group" id="inputEmail_g">
						<label for="inputEmail" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
							<span id="inputEmail_error"></span>
						</div>
					</div>
					<?php
				}
				if($log=="fail-p"){
					$fail_p = true;
					?>
					<div class="form-group has-error has-feedback" id="inputPassword_g">
						<label for="inputPassword" class="col-sm-2 control-label">Contraseña</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Contraseña">
							<span id="inputPassword_error"><span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span></span>
						</div>
					</div>
					<?php
				}else{
					?>
					<div class="form-group" id="inputPassword_g">
						<label for="inputPassword" class="col-sm-2 control-label">Contraseña</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Contraseña">
							<span id="inputPassword_error"></span>
						</div>
					</div>
					<?php
				}
				?>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8">
						<div class="checkbox">
							<label>
								<input type="checkbox"> Recordarme
							</label>

						</div>
						<div class="col-sm-offset-2 col-sm-8">
								<p>¿Olvidaste la contraseña? <a href="recovery.php">Click acá para recuperarla</a></p>
							</div>
							<div class="login-help">
								<p>¿Aún no tienes una cuenta? <a href="registration.php">Regístrate</a></p>
							</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Ingresar</button>
						<span id="input_error"></span>
						<?php if($fail_e){ ?>
						<span id="error_done"><p><strong class="text-danger">Usuario no registrado!</strong></p></span>
						<?php }elseif ($fail_p){ ?>
						<span id="error_done"><p><strong class="text-danger">Contraseña erronea!</strong></p></span>
						<?php }else{ ?>
						<span id="error_done"></span>
						<?php } ?>
					</div>
				</div>
			</form>
		</div>
		<div class="row option">

		</div>
	</div>
</section>



<?php
generate_footer(FOOTER_FIXED);
?>

</body>
</html>
