<?php


$mysqli_link = mysqli_connect("localhost", "id16377610_splashplacasdb", "V-}<hKhxC1Q)+gyo", "id16377610_splashplacas");
 
if (mysqli_connect_errno()) 
{
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}
if (!isset($_GET["matricula"]) or $_GET["matricula"]=="")
{
	echo  "-1";
	exit;
}
$sql ="INSERT INTO placas (matricula, modelo, color, ubicacion, intervencion, comentarios) VALUES ('".$_GET['matricula']."','".$_GET['modelo']."','".$_GET['color']."','".$_GET['ubicacion']."','".$_GET['intervencion']."','".$_GET['comentarios']."')";
echo $sql;
$result=mysqli_query($mysqli_link,$sql);

mysqli_commit($mysqli_link);



echo "0";

?>