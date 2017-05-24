<!DOCTYPE html>
<?php
session_start();
if($_SESSION['ok']=="ok")
{
	if($_SESSION['rol']=="Administrador")
	{
?>

<html>

<?php
	include("conexion.php");
	$con=conectarse();	
	$result=$con->query("SELECT * FROM datos_empresa");
	$row = $result->fetch_array();
?>

<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
	<link rel="stylesheet" href="css/formulario.css">
	<link rel="stylesheet" href="css/contenedor.css">
	<link rel="stylesheet" href="css/tabla.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript" src="view.js"></script>
	<title>Empresa</title>
</head>

<body>
	
	<?php include("barramenu.php"); ?>	
	
	<div class="contenedor">
		<aside>
		<div class="container">
			<div class="form__top">
				<h2><span>Datos De Empresa</span></h2>
			</div>		
			<form class="form__reg"  method="post" action="editar_almacen.php">
				<input class="input" id="nit" name= "nit" class="element text" type="text" value="<?php echo $row['nit']; ?>" placeholder="NIT" required>
				<input class="input" id="nombre" name= "nombre" class="element text" type="text" value="<?php echo $row['nombre']; ?>" placeholder="Nombre" required>
				<input class="input" id="direccion" name="direccion" class="element text" type="text"  value="<?php echo $row['direccion']; ?>" placeholder="Dirección" required>
				<input class="input" id="telefono" name= "telefono" class="element text" type="text" value="<?php echo $row['telefono']; ?>" placeholder="Teléfono" required>
				<input class="input" id="email" name= "email" class="element text" type="text" value="<?php echo $row['email']; ?>" placeholder="Email" required>

	            <div class="btn__form">
	            	<input class="btn__submit" type="submit" name="submit" value="Modificar">
	            </div>
			</form>
		</div>
		</aside>
</div>
</body>

<?php

	if(isset($_POST['submit']))
	{		
		$nit=$_POST['nit'];
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];	
		$telefono=$_POST['telefono'];
		$email=$_POST['email'];

		$result=$con->query("UPDATE datos_empresa SET nit='$nit', nombre='$nombre', direccion='$direccion', telefono='$telefono', email='$email' WHERE nit='$nit'");
?>
	    <meta http-equiv='refresh' content='1; url=almacen.php' />
<?php
    }
?>
<?php

}
	else
	{
		?>
			<script language="javascript"type="text/javascript">
						alert("Usuario no autorizado");
			</script>
			<meta http-equiv='refresh' content='0; url=almacen.php' />
		<?php
	}	
}

else
{
	header("location: index.php");
}
?>
</html>