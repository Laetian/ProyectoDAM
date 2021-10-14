<?php

$mysqli_link = mysqli_connect("localhost", "id16377610_splashplacasdb", "V-}<hKhxC1Q)+gyo", "id16377610_splashplacas");
 
if (mysqli_connect_errno()) 
{
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}
$xml="";
$sql="SELECT * from placas ";
$result=mysqli_query($mysqli_link,$sql);

while($mostrar=mysqli_fetch_array($result)){

	$xml.=$mostrar["matricula"].";";
	$xml.=$mostrar["modelo"].";";
		$xml.=$mostrar["color"].";";
			$xml.=$mostrar["ubicacion"].";";
				$xml.=$mostrar["intervencion"].";";
					$xml.=$mostrar["comentarios"].";";

}

echo $xml;
?>