
<!DOCTYPE html>
<html lang="es">

<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>

<head>
	<meta charset="UTF-8">
	<title>Menu</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="fonts.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/main.js"></script>

	<?php
	include("conexion.php");
	$con=conectarse();	
	$result=$con->query("SELECT * FROM datos_empresa");
	$row = $result->fetch_array();
?>
</head>

<body>
	<?php include("barramenu.php"); ?>		
</body>

<footer>
	<p>
		<div class="pen-title">
			<span>Usuario: <?php echo $_SESSION['nomusuario']." ".$_SESSION['apeusuario']; ?></span>
			<br>
			<span>Rol: <?php echo $_SESSION['rol']; ?></span>
		</div>		
	</p>

</footer>

<?php
}
else
{
	header("location: index.php");
}
?>
</html>
