</style>

<?php

if(isset($_POST['submit']))
{
include("conexion.php");
$con=conectarse();

$nombre=$_POST['nombre'];

$result=$con->query("INSERT INTO departamento (nombre) 
VALUES ('$nombre')");
if($result>=1)
{
	echo "<center><h1> DATOS ALMACENADOS CON EXITOS</h1></center>";
	header("Location: registrar_municipio.php");
}
else
{
	echo "<center><h1>SE HA PRODUCIDO UN ERROR</h1></center>".$con->error;
}
}
?>
<meta http-equiv='refresh' content='1; url=registrar_proveedor.php' />
</body>
</html>