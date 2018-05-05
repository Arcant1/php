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
  <title>Registro de Usuario</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <center>
      <form class="form-signup" method="POST">
        <h1 style="text-align:center;">Registro de usuario</h1>
        <form name="Registro" action="registrar.php" method="POST">
          <table width="50%" cellspacing="10" cellpadding="10">
            <tr>
              <td><label>Nombre de Usuario</label> </td>
              <td><input type="text" name="nombreUsuario"  class="form-control" placeholder="Nombre de usuario" ></td>
            </tr>
            <tr>
              <td><label>Clave</label></td>
              <td><input type="password" class="form-control"  class="form-control" placeholder="Ingrese contraseña" name="password"></td>
            </tr>
            <tr>
              <td><label>Confirmaci&oacuten de la clave</label></td>
              <td><input type="password" placeholder="Repita contraseña" class="form-control"  name="confirmarPassword" autocomplete="new-password"></td>
            </tr>
            <tr>
              <td><label>Nombre</label> </td>
              <td><input type="text" name="nombre" class="form-control"  placeholder="Nombre" ></td>
            </tr>
            <tr>
              <td><label>Apellido</label></td>
              <td><input type="text" name="apellido"  class="form-control" placeholder="Apellido" ></td>
            </tr>
            <tr>
              <td><label>Foto</label></td>
              <td><input type="file" name="Foto" class="form-control-file" accept="image/*" ></td>
            </tr>
            <tr>
              <td><label>Email</label></td>
              <td><input type="email" name="email" class="form-control"  value="" placeholder="Email" ></td>
            </tr>
          </table>
          <br>
          <button type="submit" value="Submit" class="btn btn-primary">Registrarse</button>
        </form>
      </form>
    </center>
  </div>
</body>
</html>