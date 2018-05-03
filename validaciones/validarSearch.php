<?php
  header_remove();
  if(!isset($_GET['search'])){
    header("Location: ../signin.php");
  }else {

    $buscar=$_GET['search'];
    if(isset($_GET['search-type'])){
      $seach_type = $_GET['search-type'];
    }
    
    include("../funciones/conexion.php");
    $link = conectar();
    $sql = "SELECT COUNT(p.id) AS cant
    FROM peliculas p
    INNER JOIN generos g
    ON(p.generos_id=g.id)";
    if($seach_type == "anio"){
      $sql.= " WHERE p.anio LIKE '%$buscar%'";
    }
    if($seach_type == "nombre"){
      $sql.= " WHERE p.nombre LIKE '%$buscar%'";
    }
    if($seach_type == "genero"){
      $sql.= " WHERE g.genero LIKE '%$buscar%'";
    }
    $result = mysqli_query($link,$sql);
    $arreglo = mysqli_fetch_array($result);
    $cant=$arreglo['cant'];

    mysqli_close($link);

    $parametros="total=$cant&pagina=1&buscar=$buscar&search_type=$seach_type";

    header("Location: ../index.php?$parametros");

  }
?>
