<?php
  require_once 'conection.php';

  $count = 0;

/*----------------------------------------------------------------------------*-
  SEARCH devuelve el resultado de la busqueda correspondiente a los parametros
  ----------------------------------------------------------------------------
  Params:
    $q -> string de busqueda por nombre de productos, si no se usa introducir: ""
    $cat -> categoria de los datos devueltos, si no se usa introducir: -1
    $ord -> orden de los datos devueltos, si no se usa introducir: "New"
    $page -> pagina que hay que devolver, si no se usa introducir: 1

  En caso de mysql error produce un die() con el nombre del error.
*/
  function search_query($q, $cat, $ord, $page) {
    global $count;

    $db=db_connect();
    // establecer fecha
    $date = date("Y-m-d");
    // establecer strin de busqueda
    $name = $q;
    // establecer categoria
    if ($cat > 0) {
      $categoria = "AND idCategoriaProducto=$cat";
    }else {
      $categoria = "";
    }
    // establecer orden
    switch ($ord){
      case "Min" :
         $orden = "precio ASC";
        break;
      case "Max" :
        $orden = "precio DESC";
        break;
      case "Old" :
        $orden = "publicacion ASC";
        break;
      default:
        $orden = "publicacion DESC";
    }
    // establecer pagina
    $pageLimit=$page*9-9;

    // string del query
    $query = "SELECT * FROM productos WHERE caducidad>\"$date\" $categoria AND nombre LIKE (\"%$name%\") ORDER BY $orden LIMIT $pageLimit, 9";

    // realizar query
    $result = mysqli_query($db,$query);

    if(!($result)){
      echo "error en el query";
    }

    /* calcular la cantidad de productos que cumplen con la busqueda */
    // string del query
    $query = "SELECT COUNT(*) AS \"cant\" FROM productos WHERE caducidad>\"$date\" $categoria AND nombre LIKE (\"%$name%\")";

    // realizar query
    $result_count = mysqli_query($db,$query);

    //cantidad guardada en $count
    if($result_count){
      $row = mysqli_fetch_array ($result_count);
      $count = $row['cant'];
    }else {
      echo "error en el query";
    }

    db_close();
    return $result;
  }

/*----------------------------------------------------------------------------*-
  SEARCH COUNT
  ----------------------------------------------------------------------------
  Devuelve la cantidad de productos que cumplen con la ultima busqueda realizada
*/
  function search_query_count() {
    global $count;
    return $count;
  }

/*----------------------------------------------------------------------------*-
  CATEGORY NAME
  ----------------------------------------------------------------------------
  Params:
    $cat_id -> id de la categoria buscada

  Devuelve el nombre de la categoria con id $cat_id
*/
  function get_category_name($cat_id) {
    $db=db_connect();

    // string del query
    $query = "SELECT nombre FROM `categorias_productos` WHERE idCategoriaProducto = $cat_id ";

    // realizar query
    $result = mysqli_query($db,$query);

    //resolver resultado
    $cat = "";
    if($result){
      $row = mysqli_fetch_array ($result);
      $cat = utf8_encode($row['nombre']);
    }else {
      echo "error en el query";
    }

    db_close();
    return $cat;
  }

/*----------------------------------------------------------------------------*-
  CATEGORIES
  ----------------------------------------------------------------------------
  Params:
    $param -> catidad de categorias

  Devuelve la cantidad de categorias solicitadas sin orden especifico, si no se
  especifica la cantidad devuelve todas
*/
  function get_categories($param = 0) {
    $db=db_connect();

    // string del query
    if ($param <= 0) {
      $query = "SELECT * FROM `categorias_productos`";
    }else {
      $query = "SELECT * FROM `categorias_productos` LIMIT 0, $param";
    }

    // realizar query
    $result = mysqli_query($db,$query);

    if(!($result)){
      echo "error en el query";
    }

    db_close();
    return $result;
  }

/*----------------------------------------------------------------------------*-
  PRODUCT
  ----------------------------------------------------------------------------
  Params:
    $prod_id -> id del producto buscado

  Devuelve el producto buscado
*/
  function get_product($prod_id) {
    $db=db_connect();

    // string del query
    $query = "SELECT * FROM productos WHERE idProducto = $prod_id";

    // realizar query
    $result = mysqli_query($db,$query);

    if(!($result)){
      echo "error en el query";
    }

    db_close();
    return $result;
  }

/*----------------------------------------------------------------------------*-
  USER
  ----------------------------------------------------------------------------
  Params:
    $user_id -> id del usuario buscado

  Devuelve el usuario buscado
*/
  function get_user($user_id) {
    $db=db_connect();

    // string del query
    $query = "SELECT * FROM usuarios WHERE idUsuario=$user_id";

    // realizar query
    $result = mysqli_query($db,$query);

    if(!($result)){
      echo "error en el query";
    }

    db_close();
    return $result;
  }

/*----------------------------------------------------------------------------*-
  QUERY USER
  ----------------------------------------------------------------------------
  Params:
    $id -> id del usuario buscado
    $page -> pagina que hay que devolver, si no se usa introducir: 1
  Devuelve los productos publicados por el usuario buscado
*/
  function search_query_user($page,$id) {
    global $count;

    $db=db_connect();

    // establecer pagina y orden
    $pageLimit=$page*9-9;
    $orden = "publicacion DESC";
    // string del query
    $query = "SELECT * FROM productos WHERE idUsuario=\"$id\" ORDER BY $orden LIMIT $pageLimit, 9";
    // realizar query
    $result = mysqli_query($db,$query);

    if(!($result)){
      echo "error en el query";
    }

    /* calcular la cantidad de productos que cumplen con la busqueda */
    // string del query
    $query = "SELECT COUNT(*) AS \"cant\" FROM productos WHERE idUsuario='" . $id . "'";
    // realizar query
    $result_count = mysqli_query($db,$query);

    //cantidad guardada en $count
    if($result_count){
      $row = mysqli_fetch_array ($result_count);
      $count = $row['cant'];
    }else {
      echo "error en el query";
    }

    db_close();
    return $result;
  }

/*----------------------------------------------------------------------------*-
  IS OWNER
  ----------------------------------------------------------------------------
  Params:
    $user_id -> id del usuario
    $prod_id -> id del producto

  Devuelve true si el usuario es el dueño del producto, false en caso contrario
*/
  function is_owner($user_id, $prod_id) {
    $db=db_connect();

    // string del query
    $query = "SELECT idUsuario FROM productos WHERE idProducto = $prod_id";

    // realizar query
    $result = mysqli_query($db,$query);

    db_close();
    if($result){
      if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_array ($result);
        if ($row['idUsuario'] == $user_id) {
          return true;
        }
        else {
          return false;
        }
      }else{
        echo "el producto no existe";
      }
    }else {
      echo "error en el query";
    }
  }
  /*----------------------------------------------------------------------------*-
    PRODUCT OWNER
    ----------------------------------------------------------------------------
    Params:
      $prod_id -> id del producto

    Devuelve el id del usuario dueño del producto
  */
    function product_owner($prod_id) {
      $db=db_connect();

      // string del query
      $query = "SELECT idUsuario FROM productos WHERE idProducto = $prod_id";

      // realizar query
      $result = mysqli_query($db,$query);

      db_close();
      if($result){
        if (mysqli_num_rows($result)) {
          $row = mysqli_fetch_array ($result);
          return $row['idUsuario'];
        }else{
          return -1;
        }
      }else {
        echo "error en el query";
      }
    }

?>
