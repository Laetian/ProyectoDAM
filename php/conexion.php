<?php

$hostname='localhost';
$database='id16377610_logindb';
$username='id16377610_logindbuser';
$password='RUl8QI8ql1Ef6Tc#';


$conexion=new mysqli($hostname, $username, $password, $database);
if($conexion->connect_errno){
	echo "lo sentimos, el sitio web está experimentando problemas";
	}

	?>