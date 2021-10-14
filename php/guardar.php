<?php
	include 'conexion.php';
	$matricula=$_POST['matricula'];
	$modelo=$_POST['modelo'];
	$color=$_POST['color'];
	$ubicacion=$_POST['ubicacion'];
	$intervencion=$_POST['intervencion'];
	$comentarios=$_POST['comentarios'];
	$escolta=$_POST['escolta'];

	
$consulta = "INSERT INTO `placas` (`id`, `matricula`, `modelo`, `color`, `ubicacion`, `intervencion`, `comentarios`, `escolta`) VALUES (NULL, '$matricula', '$modelo', '$color', '$ubicacion', '$intervencion', '$comentarios', '$escolta') ";
	
	mysqli_query($conexion, $consulta) or die(mysqli_error());
	mysqli_close($conexion);
	
	?>