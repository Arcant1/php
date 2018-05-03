
<?php

  include_once("../funciones/conexion.php");
  $link = conectar();
 
  include_once("../clases/comprobar.php");
  $COM = new Comprobacion();
  try {
    $COM->comprobacion();

    if(isset($_POST['idPelicula'])){
      $borrar = $_POST['idPelicula'];
      $sql = "DELETE FROM peliculas WHERE id='$borrar'";
      $result = mysqli_query($link,$sql);
      mysqli_close($link);
      
      if($result){
        header("Location: ../index.php");
      } else {
        header("Location: ../delete_movie.php");
      }
      

    }

  } catch (Exception $e) {
        mysqli_close($link);
    header("Location: ../index.php?msg=2");
  }
 ?>
