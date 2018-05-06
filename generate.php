<?php
require_once 'querys.php';

/*----------------------------------------------------------------------------*-
  constantes
  ----------------------------------------------------------------------------

*/
define("USER_LOGGED", "mAf0Lq464O");        // usuario logueado
define("USER_UNLOGGED", "ji5X9rScgv");      // usuario no logueado

define("HEADER_LOGGED", "wLY3YAQXz2");      // header con usuario logueado
define("HEADER_UNLOGGED", "FWeY0Y8N24");    // header sin usuario logueado
define("HEADER_TO_LOG", "mRxF5N0Vw0");      // header en pagina de logueo
define("HEADER_TO_REG", "183mA6Epu0");      // header en pagina de registro

define("FOOTER_STATIC", "eZx36qDKP9");      // footer el fondo del scroll
define("FOOTER_FIXED", "SD70O759Me");       // footer fijo en la ventana

define("SEARCH_LARGE", "7JPeZq884J");       // barra de busqueda grande
define("SEARCH_SHORT", "gVIm8aH8XA");       // barra de busqueda chica

 ?>

<?php
/*----------------------------------------------------------------------------*-
  genera el tag head
  ----------------------------------------------------------------------------
  Params:
    $title -> titulo local de la pagina
    $css_js -> nombre del css y js local

*/
function generate_head($title, $css_js) {

?>
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <title><?php echo $title; ?> - Pulgas Market</title>
     <link rel="icon" type="image/x-icon" href="./assets/images/favicon.ico" />
     <!-- bootstrap css y js -->
       <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
       <!-- Optional theme -->
         <!-- <link rel="stylesheet" href="./assets/css/bootstrap-theme.min.css"> -->
       <script src="./assets/js/jquery.js" defer></script>
       <script src="./assets/js/bootstrap.min.js" defer></script>
     <!-- web css y js -->
       <link rel="stylesheet" href="./assets/css/web.css">
       <script src="./assets/js/web.js" defer></script>
     <!-- local css y js -->
       <link rel="stylesheet" href="./assets/css/<?php echo $css_js; ?>.css">
       <script src="./assets/js/<?php echo $css_js; ?>.js" defer></script>
   </head>
<?php
   return 0;
}
?>

<?php
/*----------------------------------------------------------------------------*-
  genera el header
  ----------------------------------------------------------------------------
  El parametro que recibe indica que html mostar
  Params:
    $param1 -> constante HEADER_LOGGED, HEADER_UNLOGGED, HEADER_TO_LOG, HEADER_TO_REG
    $userId -> en caso de HEADER_LOGGED, este parametro contiene la ID del usuario logueado

*/
function generate_header($param1, $userId = 0) {
  if ($param1 != HEADER_LOGGED && $param1 != HEADER_UNLOGGED && $param1 != HEADER_TO_LOG && $param1 != HEADER_TO_REG) {
    echo "generate_header: parametro incorrecto";
    return 0;
  }
  if ($userId > 0) {
    $result = get_user($userId);
    if($result){
      if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_array ($result);
        $name = utf8_encode($row['nombre']);
      }
    }else {
      echo "error en el query";
    }
  }
?>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- menu responsive -->
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand hidden-xs">
            <img alt="Brand" width="80" height="80" src="assets/images/logo.gif">
          </a>
          <a href="index_inline.php" class="navbar-brand">
            Pulgas Market
          </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-PM">
            <span class="sr-only">Desplegar / Ocultar</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <!-- contenido del menu -->
        <div class="collapse navbar-collapse" id="nav-PM">
        <?php
          switch ($param1){
          case HEADER_LOGGED:
            ?>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                  <?php echo $name; ?>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="user.php">Mi Cuenta</a></li>
                  <li><a href="product_self.php">Mis Publicacines</a></li>
                  <li><a href="categories.php">Categorias</a></li>
                  <li><a href="develop.php">Historial</a></li>
                  <li class="divider"></li>
                  <li><a href="logout.php">Salir</a></li>
                </ul>
              </li>
              <li>
                <a href="develop.php">
                  <span class="glyphicon glyphicon-bell"></span>
                  <span class="sr-only">Notificaciones</span>
                  <span class="hidden-sm hidden-md hidden-lg">Notificaciones</span>
                </a>
              </li>
              <li>
                <a href="develop.php">
                  <span class="glyphicon glyphicon-shopping-cart"></span>
                  <span class="sr-only">Carrito de compras</span>
                  <span class="hidden-sm hidden-md hidden-lg">Carrito de compras</span>
                </a>
              </li>
              <li>
                <a href="develop.php">
                  <span class="glyphicon glyphicon-heart"></span>
                  <span class="sr-only">Favoritos</span>
                  <span class="hidden-sm hidden-md hidden-lg">Favoritos</span>
                </a>
              </li>
              <li><a href="product_new.php">Vender</a></li>
            </ul>
            <?php
            break;
          case HEADER_UNLOGGED:
            ?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="registration.php">Regístrate</a></li>
              <li><a href="login.php">Ingresa</a></li>
              <li><a href="product_new.php">Vender</a></li>
            </ul>
            <?php
            break;
          case HEADER_TO_LOG:
            ?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="registration.php">Regístrate</a></li>
            </ul>
            <?php
            break;
          case HEADER_TO_REG:
            ?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="login.php">Ingresa</a></li>
            </ul>
            <?php
            break;
          default:
            echo "generate_header: parametro incorrecto";
        }

         ?>
          <!-- barra de busqueda en el menu -->
          <!-- <form action="" class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="buscar">
            </div>
            <button type="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </form> -->

        </div>
      </div>
    </nav>
  </header>
<?php
  return 0;
}
?>

<?php
/*----------------------------------------------------------------------------*-
  genera el footer
  ----------------------------------------------------------------------------
  El parametro que recibe indica que html mostar
  Params:
    $param1 -> constante FOOTER_STATIC, FOOTER_FIXED

*/
function generate_footer($param1) {
  if ($param1 != FOOTER_STATIC && $param1 != FOOTER_FIXED) {
    echo "generate_footer: parametro incorrecto";
    return 0;
  }
?>
  <footer>
    <?php if ($param1 == FOOTER_STATIC) { ?>
    <!-- html FOOTER_STATIC -->
    <nav class="navbar navbar-inverse">
    <?php } else { ?>
    <!-- html FOOTER_FIXED -->
    <nav class="navbar navbar-inverse navbar-fixed-bottom">
    <?php } ?>
      <div class="container">
        Copyright © 1999-2016 Pulgas Market S.R.L.
        <ul class="list-inline pull-right">
          <li><a href="./terminos.php" data-tracking="FOOTER-TERMINOS">Términos y condiciones</a></li>
          <li><a href="./privacidad.php" data-tracking="FOOTER-PRIVACIDAD">Políticas de privacidad</a></li>
          <li><a href="./ayuda.php">Ayuda</a></li>
        </ul>
      </div>
    </nav>
  </footer>
<?php
  return 0;
}
?>

<?php
/*----------------------------------------------------------------------------*-
  genera la barra de busqueda
  ----------------------------------------------------------------------------
  El parametro que recibe indica que html mostar
  Params:
    $param1 -> constante SEARCH_LARGE, SEARCH_SHORT

*/
function generate_search($param1) {
  if ($param1 != SEARCH_LARGE && $param1 != SEARCH_SHORT) {
    echo "generate_search: parametro incorrecto";
    return 0;
  }

  $result = get_categories();

    if ($param1 == SEARCH_LARGE) {
  ?>
    <!-- html SEARCH_LARGE -->
    <section class="jumbotron">
      <div class="container">
        <div class="row">
          <!-- barra de busqueda -->
          <div class="col-md-6 col-xs-12 col-sm-12 pull-left">
            <h2 class="text-left">Buscar Productos</h2>
            <form action="index.php" method="get">
              <div class="form-group">
                <select class="form-control search-select-PM" name="cat">
                    <option value="-1">Todas</option>
                    <?php
                      $fin = mysqli_num_rows($result);
                      for ($i=0; $i < $fin; $i++) {
                        $row = mysqli_fetch_array ($result);
                     ?>
                        <option value="<?php echo $row['idCategoriaProducto']; ?>"><?php echo utf8_encode($row['nombre']); ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label class="sr-only" for="search-PM">Buscar</label>
                <input type="text" class="form-control search-in-PM" name="q" id="search-PM" placeholder="buscar">

                <button type="submit" class="btn btn-primary">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
              </div>
            </form>
          </div>
          <!-- menu de categorias -->
          <div class="col-md-6 hidden-xs hidden-sm">
            <h3>Categorías <?php if(isset($_SESSION['estado']) && $_SESSION['estado']=="logueado"){ ?><small><a href="categories.php" class="btn btn-link pull-right">Administrar categorias</a></small><?php } ?></h3>
            <div class="row">
              <?php
                mysqli_data_seek($result, 0);
                for ($i=0; $i < 3; $i++) {
               ?>
                  <div class="col-md-4">
                    <ul class="list-unstyled">
                      <?php
                        for ($j=0; $j < 4; $j++) {
                          $row = mysqli_fetch_array ($result);
                       ?>
                          <li><a href="index_inline.php?cat=<?php echo $row['idCategoriaProducto']; ?>" class="btn btn-link btn-sm"><?php echo utf8_encode($row['nombre']); ?></a></li>
                      <?php } ?>
                    </ul>
                  </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php
  }
    else {
  ?>
    <!-- html SEARCH_SHORT -->
    <section class="jumbotron">
      <div class="container">
        <div class="row">
          <!-- barra de busqueda -->
          <div class="col-md-12 col-xs-12 col-sm-12 pull-left">
            <div class="col-md-3 col-xs-12 col-sm-12 pull-left">
              <h2 class="text-left">Buscar Productos</h2>
            </div>
            <form action="index.php" method="get">
              <div class="col-md-3 col-xs-12 col-sm-12 pull-left">
              <div class="form-group">
                <select class="form-control search-select-PM-min" name="cat">
                    <option value="-1">Todas</option>
                    <?php
                      mysqli_data_seek($result, 0);
                      $fin = mysqli_num_rows($result);
                      for ($i=0; $i < $fin; $i++) {
                        $row = mysqli_fetch_array ($result);
                     ?>
                        <option value="<?php echo $row['idCategoriaProducto']; ?>"><?php echo utf8_encode($row['nombre']); ?></option>
                    <?php } ?>
                </select>
              </div>
              </div>
              <div class="col-md-6 col-xs-12 col-sm-12 pull-left">
              <div class="form-group">
                <label class="sr-only" for="search-PM">Buscar</label>
                <input type="text" class="form-control search-in-PM-min" name="q" id="search-PM" placeholder="buscar">

              <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </section>

<?php
  }
  return 0;
}
?>
