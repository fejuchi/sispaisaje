<!doctype html>
<html>
<head> 
<title> REGISTRAR USUARIOS </title>
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
$apellido=$_POST['apellido'];
$cargo=$_POST['cargo'];
$fecha=$_POST['fecha'];
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$tipousuario=$_POST['tipousuario'];

$result=$con->query("INSERT INTO usuario (nombre, apellido, cargo,  fecha, usuario, clave, tipousuario) 
	VALUES ('$nombre', '$apellido', '$cargo', '$fecha', '$usuario', '$clave', '$tipousuario')");

if($result>=1)
{
	echo "<center><h1> DATOS ALMACENADOS CON EXITOS</h1></center>";
	header("Location: personal.php");
}
else
{
	echo "<center><h1>SE HA PRODUCIDO UN ERROR</h1></center>";
}
}
?>
<meta http-equiv='refresh' content='1; url=personal.php' />
</body>
</html>