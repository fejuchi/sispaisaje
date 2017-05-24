<!doctype html>
<html>
<head> 
<title> REGISTRAR UBICACION</title>
<html lang="es">
<meta charset="UTF-8">
</head>
<body>

<?php
if(isset($_POST['submit']))
{
include("conexion.php");
$con=conectarse();
$codigo_categoria=$_POST['codigo_categoria'];
$descripcion=$_POST['descripcion'];

$result=$con->query("INSERT INTO categoria (codigo_categoria, descripcion) 
VALUES ('$codigo_categoria', '$descripcion')");
if($result>=1)
{
	echo "<center><h1> DATOS ALMACENADOS CON EXITOS</h1></center>";
	header("Location: categoria.php");
}
else
{
	echo "<center><h1>SE HA PRODUCIDO UN ERROR</h1></center>".$con->error;
}
}
?>
<meta http-equiv='refresh' content='1; url=categoria.php' />
</body>
</html>