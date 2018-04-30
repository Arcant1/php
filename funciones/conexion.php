<?php

function conectar(){

	$link = mysqli_connect('localhost','root','','Blockbuster')
	or die("Error " . mysqli_error($link));

	return $link;

}
?>
