<!doctype html>
<html>
<head> 
<title> REGISTRAR USUARIOS </title>
<html lang="es">
<meta charset="UTF-8">
</head>
<body bgcolor="#FF8000">
<style>
h1  {color:#0174DF}
</style>

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
$codigo_dep=$_POST['departamento'];


$result=$con->query("INSERT INTO cliente (nit_cliente, nombre, apellido, direccion,  telefono, email, codigo_mun) 
	VALUES ('$nit_cliente', '$nombre', '$apellido', '$direccion', '$telefono, '$email', '$codigo_dep')");

if($result>=1)
{
	echo "<center><h1> DATOS ALMACENADOS CON EXITOS</h1></center>";
}
else
{
	echo "<center><h1>SE HA PRODUCIDO UN ERROR</h1></center>";
}
}
?>
<meta http-equiv='refresh' content='1; url=registrar_cliente.php' />
</body>
</html>