<!doctype html>
<html>
<head> 
<title> REGISTRAR PRODUCTO </title>
<html lang="es">
<meta charset="UTF-8">
</head>
<body bgcolor="#FF8000">
<style>
h1   {color:#0174DF}
</style>

<?php

if(isset($_POST['submit']))
{
include("conexion.php");
$con=conectarse();

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$tamano=$_POST['tamano'];
$preciocosto=$_POST['preciocosto'];
$precioventa=$_POST['precioventa'];	
$categoria=$_POST['categoria'];	
$proveedor=$_POST['proveedor'];	


$result=$con->query("INSERT INTO producto(codigo_producto, nombre, tamano, precio_costo, precio_venta, codigo_categoria, nit_proveedor) 
VALUES ('$id', '$nombre', '$tamano', '$preciocosto', '$precioventa', '$categoria', '$proveedor')");
if($result>=1)
{
	echo "<center><h1> DATOS ALMACENADOS CON EXITOS</h1></center>";
}
else
{
	echo "<center><h1>SE HA PRODUCIDO UN ERROR</h1></center>".$con->error;
}
}
?>
<meta http-equiv='refresh' content='1; url=registrar_producto.php' />
</body>
</html>