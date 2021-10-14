<?php
	$con = mysqli_connect("localhost", "id16377610_logindbuser", "RUl8QI8ql1Ef6Tc#", "id16377610_logindb");

	$busqueda  = $_GET['busqueda'];




	$consulta = "SELECT * FROM placas WHERE matricula = '$busqueda' ";
	$resultado = $con ->query($consulta);

    while($fila=$resultado -> fetch_array()){
        $placa[] = array_map('utf8_encode', $fila);
    }
    
    echo json_encode($placa);
    $resultado -> close();



    


?>