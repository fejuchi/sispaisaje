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
if(isset($_GET['nombre']))
{
	include("conexion.php");
	$con=conectarse();
	$nombre=$_GET['nombre'];
	$result=$con->query("SELECT * FROM proveedor WHERE nombre='$nombre'");
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
	<title>Proveedores</title>
</head>

<body>
	
	<?php include("barramenu.php"); ?>	
	
	<div class="contenedor">
		<aside>
		<div class="container">
			<div class="form__top">
				<h2><span>Modificar Proveedor</span></h2>
			</div>		
			<form class="form__reg"  method="post" action="editar_proveedor.php">
				<input class="input" id="nit" name= "nit" class="element text" type="text" value="<?php echo $row['nit_proveedor']; ?>" placeholder="NIT" required>
				<input class="input" id="nombre" name= "nombre" class="element text" type="text" value="<?php echo $row['nombre']; ?>" placeholder="Nombre" required>
				<input class="input" id="telefono" name= "telefono" class="element text" type="text" value="<?php echo $row['telefono']; ?>" placeholder="Teléfono" required>
				<input class="input" id="direccion" name="direccion" class="element text" type="text"  value="<?php echo $row['direccion']; ?>" placeholder="Dirección" required>
				<input class="input" id="email" name= "email" class="element text" type="text" value="<?php echo $row['email']; ?>" placeholder="Email" required>

	            <div class="btn__form">
	            	<input class="btn__submit" type="submit" name="submit" value="Modificar">
	            </div>
			</form>
		</div>
		</aside>

		<section class="main">
			<form id="form_1075005" class="appnitro"  method="post" action="proveedores.php">
					<h2>Lista de Proveedores</h2>
					<br>
				<ul >
					<div>
						<input id="usuario" name="usuario" class="element text medium" type="text" maxlength="255" value="" required /> 
					</div>
					<br>
					<div>
						<input id="saveForm" class="button_text" type="submit" name="submit" value="Buscar" />
						<br>
						<br>
					</div>
				</ul>
			</form>	

			<?php
			if(isset($_POST['submit']))
			{
			include("conexion.php");
			$con=conectarse();
			$nombre=$_POST['nombre'];
			$result=$con->query("SELECT * FROM proveedor WHERE nombre='$nombre'");
			?>

			<?php
			if($result->num_rows > 0)
			{
			?>
		<table border="1" >
			<thead>
				<tr bgcolor="#33b5e5">
					<th>NIT</th>
					<th>NOMBRE</th>
					<th>DIRECCIÓN</th>
					<th>TELÉFONO</th>
					<th>EMAIL</th>
					<th>ACCIÓN</th>
				</tr>
			</thead>
		
			<?php
			$row = $result->fetch_array();
			?>

			<tbody>
				<tr>
					<td data-label="Codigo"><?php echo $row['nit_proveedor']; ?></td>
					<td data-label="Nombre"><?php echo $row['nombre']; ?></td>
					<td data-label="Dirección"><?php echo $row['direccion']; ?></td>
					<td data-label="Teléfono"><?php echo $row['telefono']; ?></td>
					<td data-label="Email"><?php echo $row['email']; ?></td>
					<td data-label="Acción">
						<a title="Editar?" href="editar_proveedor.php? nombre=<?php echo $row['nombre']; ?>">
							<font size='2'>Editar</font>	
						</a>
						<a title="Eliminar?" href="eliminar_proveedor.php? nombre=<?php echo $row['nombre']; ?>">
							<font size='2'>Eliminar</font>
						</a>
					</td>  	 
				</tr>
			</tbody>
		</table>
	
			<?php
			}
			else
			{
				echo "<H3>SIN RESULTADOS</H3>";
			}
			}	

			if(!isset($_POST['submit']))
			{
				/*include("conexion.php");*/
				$con=conectarse();
				$result=$con->query("SELECT * FROM proveedor");
			?>
			<?php
			if($result->num_rows > 0)
			{
			?>
		
		<table border="1" >
			<thead>
				<tr bgcolor="#33b5e5">
					<th>NIT</th>
					<th>NOMBRE</th>
					<th>DIRECCIÓN</th>
					<th>TELÉFONO</th>
					<th>EMAIL</th>
					<th>ACCIÓN</th>
				</tr>
			</thead>
		
			<?php
			while($row = $result->fetch_array())
			{
			?>

		<tbody>	
			<tr>
				<td data-label="Codigo"><?php echo $row['nit_proveedor']; ?></td>
				<td data-label="Nombre"><?php echo $row['nombre']; ?></td>
				<td data-label="Dirección"><?php echo $row['direccion']; ?></td>
				<td data-label="Teléfono"><?php echo $row['telefono']; ?></td>
				<td data-label="Email"><?php echo $row['email']; ?></td>

				<td data-label="Acción">
					<a title="Editar?" href="editar_proveedor.php? nombre=<?php echo $row['nombre']; ?>">
						<font size='2'>Editar</font>	
					</a> 
					<a title="Eliminar?" href="eliminar_proveedor.php? nombre=<?php echo $row['nombre']; ?>">
						<font size='2'>Eliminar</font>
					</a>
				</td> 
			</tr>
		</tbody>
		<?php
		}
		?>		
		</table>
      
	<?php
		}
		}		
	?>	
		</section>
	
</div>
</body>

<?php
}
else
{
	if(isset($_POST['submit']))
	{
		include("conexion.php");
	    $con=conectarse();
		$nit=$_POST['nit'];
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		$email=$_POST['email'];		

		$result=$con->query("UPDATE proveedor SET nit_proveedor='$nit', nombre='$nombre', direccion='$direccion', telefono='$telefono', email='$email' WHERE nit_proveedor='$nit'");
	}
?>
	<meta http-equiv='refresh' content='1; url=proveedores.php' />
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
			<meta http-equiv='refresh' content='0; url=proveedores.php' />
		<?php
	}	
}

else
{
	header("location: index.php");
}
?>
</html>