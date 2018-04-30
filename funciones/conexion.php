<?php

function conectar(){

	$link = mysqli_connect('localhost','root','','biblio')
	or die("Error " . mysqli_error($link));

	return $link;

}
?>
