<!DOCTYPE html>
<?php
session_start();
if($_SESSION['ok']=="ok")
{
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
	<title>Clientes</title>
</head>

<body>

	<?php include("barramenu.php"); ?>	

	<div class="contenedor">
		<aside>
		<div class="container">
			<div class="form__top">
				<h2><span>Registro de Cliente</span></h2>
			</div>		
			<form class="form__reg"  method="post" action="registrar_cliente.php">
				<input class="input" id="nit_cliente" name= "nit_cliente" class="element text" type="text" value="" placeholder="NIT" required>
				<input class="input" id="nombre" name= "nombre" class="element text" type="text" value="" placeholder="Nombre" required>
				<input class="input" id="apellido" name= "apellido" class="element text" type="text" value="" placeholder="Apellidos" required>
				<input class="input" id="direccion" name="direccion" class="element text" type="text"  value="" placeholder="Dirección" required>
				<input class="input" id="telefono" name= "telefono" class="element text" type="text" value="" placeholder="Teléfono" required>
				<input class="input" id="email" name= "email" class="element text" type="mail" value="" placeholder="Email" required>
		
					<label class="description" for="element_1">Municipio </label>
					<div>
						<select class="input" id="muncipio" name="municipio" required>
							<?php
							include("conexion.php");
							$con=conectarse();	
							$result=$con->query("SELECT * FROM municipio order by nombre asc");
							?>
							<option value="0" selected="selected">Seleccione</option>
							<?php while ($row=mysqli_fetch_array($result)){ ?>
							<option value="<?php echo $row['codigo_mun']?>"><?php echo $row['nombre']?></option>
							<?php }?>	
						</select>
					</div> 
				<br>
	            <div class="btn__form">
	            	<input class="btn__submit" type="submit" name="submit" value="Registrar">
	            	<input class="btn__reset" type="reset" value="Limpiar">	
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
					<td data-label="NIT"><?php echo $row['nit_cliente']; ?></td>
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
				//include("conexion.php");
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
				<td data-label="NIT"><?php echo $row['nit_cliente']; ?></td>
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
	header("location: index.php");
}
?>
</html>