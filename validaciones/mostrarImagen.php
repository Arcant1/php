<?php
  $link = mysqli_connect('localhost','root','','Blockbuster')
  or die("Error " . mysqli_error($link));

  $id = $_GET['idPelicula'];

  $sql = "SELECT contenidoimagen, tipoimagen
  FROM peliculas
  WHERE id='$id'";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);
  mysqli_close($link);
  // se imprime la imagen y se le avisa al navegador que lo que se está
  // enviando no es texto, sino que es una imagen un tipo en particular
  header("Content-type: " . $row['tipoimagen']);
  echo $row['contenidoimagen'];

?>