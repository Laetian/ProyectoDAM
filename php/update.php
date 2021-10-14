<?php
	include 'conexion.php';
	
	$id=$_POST['id'];
	$matricula=$_POST['matricula'];
	$modelo=$_POST['modelo'];
	$color=$_POST['color'];
	$ubicacion=$_POST['ubicacion'];
	$intervencion=$_POST['intervencion'];
	$comentarios=$_POST['comentarios'];
	$escolta=$_POST['escolta'];

	 $sql = "SELECT * FROM placas WHERE id = '$id'";
	 
	$statement = "UPDATE placas Set matricula='$matricula', modelo='$modelo', color='$color', ubicacion='$ubicacion', intervencion='$intervencion', comentarios='$comentarios', escolta='$escolta' WHERE id='$id'";
    mysqli_query($conexion,$statement);

	
	$response = array();
	$response["success"] = true;
	
	echo json_encode($response);
?>