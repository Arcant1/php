
<?php
include_once("../clases/comprobar.php");
$COM = new Comprobacion();
try {
  $COM->comprobacion();

  if($_POST['Nombre'] != "" && $_POST['Sinopsis'] != "" && $_POST['Anio'] != "" && getimagesize($_FILES['File']['tmp_name']) ){

       $nombre = $_POST['Nombre'];
       $genero = $_POST['Genero'];
       $sinopsis = $_POST['Sinopsis'];
       $anio = $_POST['Anio'];

       $imagen = addslashes(file_get_contents ($_FILES['File']['tmp_name']));
       $dir = $_FILES["File"]["name"];
       $extension = pathinfo($dir,PATHINFO_EXTENSION);

       //include_once("../funciones/conexion.php");
       //$link = conectar();

       $link = mysqli_connect('localhost','root','','Blockbuster')
	     or die("Error " . mysqli_error($link));

       $sql = "SELECT id FROM generos WHERE genero = '$genero'";

       $result = mysqli_query($link, $sql);

       $arreglo = mysqli_fetch_array($result);

       $idGenero = $arreglo['id'];
       
       $sql  =  "INSERT INTO peliculas (nombre, sinopsis, anio, generos_id, contenidoimagen, tipoimagen)
       VALUES ('$nombre','$sinopsis','$anio','$idGenero', '{$imagen}', '$extension')";

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
