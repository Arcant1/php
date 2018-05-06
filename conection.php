<?php
/*----------------------------------------------------------------------------*-
  DATABASE info
  ----------------------------------------------------------------------------

*/
define("DB_NAME", "grupo23");      // nombre de la base de datos
define("DB_USER", "root");       // usuario de la base de datos
define("DB_PASS", "");           // pass de la base de datos

  $enlace = NULL;                // conexion a la base de datos

/*----------------------------------------------------------------------------*-
  DATABASE abre la conexion a la base de datos
  ----------------------------------------------------------------------------
  Params:
    $user -> usuario de la base de datos
    $pass -> contraseña de la base de datos
    $name -> nombre de la base de datos

  Devuelve la conexion creada, o la existente si habia una creada.
  En caso de mysql error produce un die() con el nombre del error.
*/
  function db_connect() {
    global $enlace;

    if (is_null($enlace)) {
      $enlace = mysqli_connect('localhost', DB_USER, DB_PASS, DB_NAME);

      if (!$enlace) {
        die("Error de Conexión (". mysqli_connect_errno().") ". mysqli_connect_error());
      }

      //echo "Éxito... " . mysqli_get_host_info($enlace) . "\n";
      return $enlace;
    }
    else{
      //echo "Enlace ya establecido... " . mysqli_get_host_info($enlace) . "\n";
      return $enlace;
    }
  }

/*----------------------------------------------------------------------------*-
  DATABASE cierra la conexion a la base de datos
  ----------------------------------------------------------------------------
  Devuelve true si se cerro la conexion con exito y false si ya estaba cerrada o no habia conexion.
  En caso de mysql error produce un die() con el nombre del error.
*/
  function db_close() {
    global $enlace;

    if (!is_null($enlace)) {
      if (mysqli_close($enlace)){
        //echo "Éxito... Conexion cerrada\n";
        $enlace = NULL;
        return 1;
      }
      else{
        die("Error de Conexión (". mysqli_errno().") ". mysqli_error());
      }
    }
    else{
      //echo "La conexion ya estaba cerrada\n";
    }
    return 0;
  }

?>
