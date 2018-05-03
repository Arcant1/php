
<?php
include_once("../clases/comprobar.php");
$COM = new Comprobacion();
try {
  $COM->comprobacion();

  if($_POST['Nombre'] != "" && $_POST['Sinopsis'] != "" && $_POST['Anio'] != ""){

      $UpdateImagen = 0;
      if(getimagesize($_FILES['File']['tmp_name'])){
          $imagen = addslashes(file_get_contents ($_FILES['File']['tmp_name']));
          $dir = $_FILES["File"]["name"];
          $extension = pathinfo($dir,PATHINFO_EXTENSION);
          $UpdateImagen = 1;
       } 
       $nombre = $_POST['Nombre'];
       $genero = $_POST['Genero'];
       $sinopsis = $_POST['Sinopsis'];
       $anio = $_POST['Anio'];
       $id_pelicula = $_POST['idPelicula'];

       $link = mysqli_connect('localhost','root','','Blockbuster')
	     or die("Error " . mysqli_error($link));

       $sql = "SELECT id FROM generos WHERE genero = '$genero'";

       $result = mysqli_query($link, $sql);

       $arreglo = mysqli_fetch_array($result);

       $idGenero = $arreglo['id'];
       
       $sql  =  "UPDATE peliculas
       SET  nombre= '$nombre', sinopsis= '$sinopsis', anio= '$anio', generos_id= '$idGenero'";

       if($UpdateImagen){
        $sql.= ", contenidoimagen='{$imagen}', tipoimagen='$extension'";
       }

       $sql.= " WHERE id= '$id_pelicula'";

       $result = mysqli_query($link, $sql);

       mysqli_close($link);

       if($result){
         header("Location: ../index.php?msg=1");
       }
       else {
         header("Location: ../new_movie.php");
       }
   }else {
       header("Location: ../new_movie.php");
   }

} catch (Exception $e) {
  mysqli_close($link);
  header("Location: ../index.php?msg=2");
}
?>
