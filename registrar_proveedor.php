<!doctype html>
<html>
<head> 
<title> REGISTRAR PROVEEDOR </title>
<html lang="es">
<meta charset="UTF-8">
</head>
<body>

<?php
if(isset($_POST['submit']))
{
include("conexion.php");
$con=conectarse();

$nit=$_POST['nit'];
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];

$result=$con->query("INSERT INTO proveedor (nit_proveedor, nombre, direccion, telefono, email) 
VALUES ('$nit', '$nombre', '$direccion', '$telefono',  '$email')");
if($result>=1)
{
	echo "<center><h1> DATOS ALMACENADOS CON EXITOS</h1></center>";
	header("Location: proveedores.php");
}
else
{
	echo "<center><h1>SE HA PRODUCIDO UN ERROR</h1></center>".$con->error;
}
}
?>
<meta http-equiv='refresh' content='1; url=proveedores.php' />
</body>
</html>