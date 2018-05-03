<?php
        
      if($_GET['comentario'] != "" || $_GET['fecha'] != "" || $_GET['calificacion'] != "" || $_GET['movie'] != ""){

        include("../funciones/conexion.php");
        $link = conectar();

   	    $comentario = $_GET['comentario'];
        $fecha = $_GET['fecha'];
        $calificacion = $_GET['calificacion'];
        $user = $_GET['user_id'];
        $movie = $_GET['movie'];
 
        $sql = "INSERT INTO comentarios (comentario,fecha,peliculas_id,usuarios_id,calificacion) VALUES ('$comentario','$fecha','$movie','$user','$calificacion')";
        $result = mysqli_query($link,$sql);
        mysqli_close($link);
        if($result){
            header("Location: ../show_movie.php?idPelicula=$movie");
        } else {
            header("Location: ../show_movie.php?idPelicula=$movie");
        }

      }else{
        header("Location: ../show_movie.php?idPelicula=$movie");
      }
?>