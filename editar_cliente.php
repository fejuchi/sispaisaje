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
	$result=$con->query("SELECT * FROM cliente WHERE nombre='$nombre'");
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
	<title>Clientes</title>
</head>

<body>
	
	<?php include("barramenu.php"); ?>	
	
	<div class="contenedor">
		<aside>
		<div class="container">
			<div class="form__top">
				<h2><span>Modificar Cliente</span></h2>
			</div>		
			<form class="form__reg"  method="post" action="editar_cliente.php">
				<input class="input" id="nit_cliente" name= "nit_cliente" class="element text" type="text" value="<?php echo $row['nit_cliente'];?>" placeholder="NIT" required>
				<input class="input" id="nombre" name= "nombre" class="element text" type="text" value="<?php echo $row['nombre']; ?>" placeholder="Nombre" required>
				<input class="input" id="apellido" name= "apellido" class="element text" type="text" value="<?php echo $row['apellido']; ?>" placeholder="Apellidos" required>
				<input class="input" id="direccion" name="direccion" class="element text" type="text"  value="<?php echo $row['direccion']; ?>" placeholder="Dirección" required>
				<input class="input" id="telefono" name= "telefono" class="element text" type="text" value="<?php echo $row['telefono']; ?>" placeholder="Teléfono" required>
				<input class="input" id="email" name= "email" class="element text" type="text" value="<?php echo $row['email']; ?>" placeholder="Email" required>
				<select class="input" name="municipio" name="municipio" required>
					<?php			
					$result2=$con->query("SELECT * FROM municipio");
					while($row2 = $result2->fetch_array())
					{
					?>
					 <option  value="<?php echo $row2['codigo_mun']; ?>"  <?php if($row['codigo_mun'] == $row2['codigo_mun']){ ?> selected <?php } ?> > <?php echo $row2['nombre']; ?> </option> 
					<?php
					}
					?>
				</select> 

	            <div class="btn__form">
	            	<input class="btn__submit" type="submit" name="submit" value="Modificar">
	            </div>
			</form>
		</div>
		</aside>

		<section class="main">
			<form id="form_1075005" class="appnitro"  method="post" action="cliente.php">
					<h2>Lista de Clientes</h2>
					<br>
				<ul >
					<div>
						<input id="nombre" name="nombre" class="element text medium" type="text" maxlength="255" value="" required /> 
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
			//include("conexion.php");
			//$con=conectarse();
			$nombre=$_POST['nombre'];
			$result=$con->query("SELECT * FROM cliente WHERE nombre='$nombre'");
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
					<th>DIRECCIÓM</th>
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
					<td data-label="Codigo"><?php echo $row['nit_cliente']; ?></td>
					<td data-label="Nombre"><?php echo $row['nombre'].' '.$row['apellido']; ?></td>
					<td data-label="Dirección"><?php echo $row['direccion'].' '.$row['codigo_mun'];?></td>
					<td data-label="Teléfono"><?php echo $row['telefono']; ?></td>
					<td data-label="Email"><?php echo $row['email']; ?></td>

					<td data-label="Acción">
						<a title="Editar?" href="editar_cliente.php? nombre=<?php echo $row['nombre']; ?>">
							<font size='2'>Editar</font>	
						</a>
						<a title="Eliminar?" href="eliminar_cliente.php? nombre=<?php echo $row['nombre']; ?>">
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
				//$con=conectarse();
				$result=$con->query("SELECT * FROM cliente");
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
					<th>DIRECCIÓM</th>
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
				<td data-label="Codigo"><?php echo $row['nit_cliente']; ?></td>
				<td data-label="Nombre"><?php echo $row['nombre'].' '.$row['apellido']; ?></td>
				<td data-label="Dirección"><?php echo $row['direccion'].' '.$row['codigo_mun'];?></td>
				<td data-label="Teléfono"><?php echo $row['telefono']; ?></td>
				<td data-label="Email"><?php echo $row['email']; ?></td>

				<td data-label="Acción">
					<a title="Editar?" href="editar_cliente.php? nombre=<?php echo $row['nombre']; ?>">
						<font size='2'>Editar</font>	
					</a> 
					<a title="Eliminar?" href="eliminar_cliente.php? nombre=<?php echo $row['nombre']; ?>">
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
	    	$nit_cliente=$_POST['nit_cliente'];
			$nombre=$_POST['nombre'];
			$apellido=$_POST['apellido'];
			$direccion=$_POST['direccion'];
			$telefono=$_POST['telefono'];	
			$email=$_POST['email'];	
			$codigo_mun=$_POST['municipio'];	

		$result=$con->query("UPDATE cliente SET nit_cliente='$nit_cliente', nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono', email='$email', codigo_mun='$codigo_mun' WHERE nit_cliente='$nit_cliente'");
	}
?>
	<meta http-equiv='refresh' content='1; url=cliente.php' />
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
			<meta http-equiv='refresh' content='0; url=cliente.php' />
		<?php
	}	
}

else
{
	header("location: index.php");
}
?>
</html>