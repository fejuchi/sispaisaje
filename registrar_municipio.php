<!doctype html>
<html>
<head> 
<title> REGISTRAR municipio</title>
<html lang="es">
<meta charset="UTF-8">
</head>
<body>

<?php

if(isset($_POST['submit']))
{
include("conexion.php");
$con=conectarse();
$nombre=$_POST['nombre'];
$depto=$_POST['departamento'];

$result=$con->query("INSERT INTO municipio (nombre, codigo_dep) 
VALUES ('$nombre', '$depto')");
if($result>=1)
{
	echo "<center><h1> DATOS ALMACENADOS CON EXITOS</h1></center>";
	header("Location: municipio.php");
}
else
{
	echo "<center><h1>SE HA PRODUCIDO UN ERROR</h1></center>".$con->error;
}
}
?>
<meta http-equiv='refresh' content='1; url=municipio.php' />
</body>
</html>