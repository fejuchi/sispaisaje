<!doctype html>
<html>
<head> 
<title> REGISTRAR CLIENTE </title>
<html lang="es">
<meta charset="UTF-8">
</head>
<body>

<?php

if(isset($_POST['submit']))
{
include("conexion.php");
$con=conectarse();

$nit_cliente=$_POST['nit_cliente'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];	
$email=$_POST['email'];	
$codigo_mun=$_POST['municipio'];	


$result=$con->query("INSERT INTO cliente (nit_cliente, nombre, apellido, direccion, telefono, email, codigo_mun) 
VALUES ('$nit_cliente', '$nombre', '$apellido', '$direccion', '$telefono', '$email', '$codigo_mun')");
if($result>=1)
{
	echo "<center><h1> DATOS ALMACENADOS CON EXITOS</h1></center>";
	header("Location: cliente.php");
}
else
{
	echo "<center><h1>SE HA PRODUCIDO UN ERROR</h1></center>".$con->error;
}
}
?>
<meta http-equiv='refresh' content='1; url=cliente.php' />
</body>
</html>