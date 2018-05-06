<?php
/*----------------------------------------------------------------------------*-
  constantes
  ----------------------------------------------------------------------------

*/
define("ACCESS_PUBLIC", "wLY3YAQXz2");        // acceso publico
define("ACCESS_USER_ALL", "FWeY0Y8N24");      // acceso solo para usuarios logueados
define("ACCESS_USER_PRIVATE", "mRxF5N0Vw0");  // acceso a un usuario unico
define("ACCESS_SUCCESS", "183mA6Epu0");       // acceso exitoso
define("ACCESS_DENIED", "64HjpL3pu0");       // acceso denegado

/*----------------------------------------------------------------------------*-
  CLASE ACCESO
  ----------------------------------------------------------------------------

  Al ejecutar el constructor se carga la sesion
*/
class Access{
  function __construct() {
    session_start();
  }
  /*----------------------------------------------------------------------------*-
    PERMISOS
    ----------------------------------------------------------------------------
    Params:
      $param1 -> constante ACCESS_PUBLIC, ACCESS_USER_ALL, ACCESS_USER_PRIVATE
      $user_id -> en el caso de ACCESS_USER_PRIVATE se tiene que pasar por parametro el id del usuario que SI tiene el acceso


  */
    function accessPermission($param1, $user_id=-1 ) {
      if ($param1 != ACCESS_PUBLIC && $param1 != ACCESS_USER_ALL && $param1 != ACCESS_USER_PRIVATE) {
        echo "access_permission: parametro incorrecto";
        return 0;
      }
      // validacion de permisos de acceso
      if (!($this->userSignedIn())) {
        if ($param1 == ACCESS_USER_ALL || $param1 == ACCESS_USER_PRIVATE) {
          $_SESSION['access_error'] = ACCESS_USER_ALL;
          $_SESSION['access_page'] = $_SERVER['REQUEST_URI'];
          $_SESSION['access_info'] = "";
          throw new Exception();
          return 0;
        }
        return true;
      }else{
        if ($param1 == ACCESS_USER_PRIVATE && $user_id != $_SESSION['idUsuario']) {
          $_SESSION['access_error'] = ACCESS_USER_PRIVATE;
          $_SESSION['access_page'] = $_SERVER['REQUEST_URI'];
          $_SESSION['access_info'] = "El usuario ".$_SESSION['idUsuario']." intento entrar a ".$_SERVER['REQUEST_URI']." que pertence a ".$user_id;
          throw new Exception();
          return 0;
        }
        return true;
      }

    }
  /*----------------------------------------------------------------------------*-
    ACCESO DENEGADO
    ----------------------------------------------------------------------------
    Params:
      $location -> direccion a la que redirigir

    Redirige a la direccion que recibe, por defecto es el index.php
  */
    function accessDenied($location="index.php") {
      header('Location: '.$location);
      exit;
      return 0;
    }

  /*----------------------------------------------------------------------------*-
    INFO
    ----------------------------------------------------------------------------
    Genera alertas sobre intentos de ecceso fallidos

  */
    function accessInfo() {
      // chequear por errores de acceso
      if (isset($_SESSION['access_error']) && $_SESSION['access_error']!=ACCESS_SUCCESS){
        switch ($_SESSION['access_error']){
          case ACCESS_USER_ALL:
            $mensaje ="<strong>Acceso no permitido:</strong> para poder acceder a la pagina <strong>".$_SESSION['access_page']."</strong> tiene que haber iniciado sesion.";
            break;
          case ACCESS_USER_PRIVATE:
            $mensaje ="<strong>Acceso no permitido:</strong> la pagina <strong>".$_SESSION['access_page']."</strong> no le pertenece.";
            break;
          default:
            $mensaje =$_SESSION['access_page']." <strong>Acceso no permitido.</strong>";
        }
        ?>
          <div class="container rec-alert">
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $mensaje; ?>
            </div>
          </div>
        <?php
        $_SESSION['access_error'] = ACCESS_SUCCESS;
        return 1;
      }
      return 0;
    }

  /*----------------------------------------------------------------------------*-
    USER SIGNED IN
    ----------------------------------------------------------------------------
    Devuelve true si hay un usuario logueado, false en caso contrario

  */
    function userSignedIn() {
      if (isset($_SESSION['estado']) && $_SESSION['estado']=="logueado") {
        return true;
      }else{
        return false;
      }
    }
}

?>
