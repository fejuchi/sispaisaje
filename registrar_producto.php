<!doctype html>
<html>
<head> 
<title> REGISTRAR PRODUCTO </title>
<html lang="es">
<meta charset="UTF-8">
</head>
<body>

<?php
if(isset($_POST['submit']))
{
include("conexion.php");
$con=conectarse();

$codigo_producto=$_POST['codigo_producto'];
$nombre=$_POST['nombre'];
$tamano=$_POST['tamano'];
$preciocosto=$_POST['preciocosto'];
$precioventa=$_POST['precioventa'];	
$categorias=$_POST['categorias'];	
$proveedores=$_POST['proveedores'];	


$result=$con->query("INSERT INTO producto (codigo_producto, nombre, tamano, precio_costo, precio_venta, codigo_categoria, nit_proveedor) 
VALUES ('$codigo_producto', '$nombre', '$tamano', '$preciocosto', '$precioventa', '$categorias', '$proveedores')");
if($result>=1)
{
	echo "<center><h1> DATOS ALMACENADOS CON EXITOS</h1></center>";
	header("Location: productos.php");
}
else
{
	echo "<center><h1>SE HA PRODUCIDO UN ERROR</h1></center>".$con->error;
}
}
?>
<meta http-equiv='refresh' content='1; url=productos.php' />
</body>
</html>