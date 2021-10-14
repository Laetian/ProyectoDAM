<?php
	$con = mysqli_connect("localhost", "id16377610_logindbuser", "RUl8QI8ql1Ef6Tc#", "id16377610_logindb");
	
	$usuario  = $_POST["usuario"];
	$clave  = $_POST["clave"];
	$level  = $_POST["level"];	
	$statement = mysqli_prepare($con, "INSERT INTO user (usuario, clave, level) VALUES
		(?, ?, ?)");
	mysqli_stmt_bind_param($statement,"ssi", $usuario, $clave, $level);
	mysqli_stmt_execute($statement);
	
	$response = array();
	$response["success"] = true;
	
	echo json_encode($response);
?>