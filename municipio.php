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
	<title>Ubicación</title>
</head>

<body>

	<?php include("barramenu.php"); ?>	

	<div class="contenedor">
		<aside>
		<div class="container">
			<div class="form__top">
				<h2><span>Registro de Municipio</span></h2>
			</div>		
			<form class="form__reg"  method="post" action="registrar_municipio.php">
				<input class="input" id="nombre" name= "nombre" class="element text" type="text" value="" placeholder="Nombre" required>
					<label class="description" for="element_6">Departamento</label>
					<div>
						<select class="input" id="departamento" name="departamento"  required>
							<?php
							include("conexion.php");
							$con=conectarse();	
							$result=$con->query("SELECT * FROM departamento order by nombre asc");
							?>
							<option value="0" selected="selected">Seleccione</option>
							<?php while ($row=mysqli_fetch_array($result)){ ?>
							<option value="<?php echo $row['codigo_dep']?>"><?php echo $row['nombre']?></option>
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
			<form id="form_1075005" class="appnitro"  method="post" action="municipio.php">
					<h2>Lista de Municipios</h2>
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
				$result=$con->query("SELECT * FROM municipio WHERE nombre='$nombre'");	
			?>

			<?php
			if($result->num_rows > 0)
			{
			?>
		<table border="1" >
			<thead>
				<tr bgcolor="#33b5e5">
					<th>CODIGO</th>
					<th>NOMBRE</th>
					<th>DEPARTAMENTO</th>
					<th>ACCIÓN</th>
				</tr>
			</thead>
		
			<?php
			$row = $result->fetch_array();
			?>

			<tbody>
				<tr>
					<td data-label="Codigo"><?php echo $row['codigo_mun']; ?></td>
					<td data-label="Nombre"><?php echo $row['nombre']; ?></td>
					<td data-label="Departamento"><?php echo $row['codigo_dep']; ?></td>
					<td data-label="Acción">

						<a title="Editar?" href="editar_municipio.php? nombre=<?php echo $row['nombre']; ?>">
							<font size='2'>Editar</font>	
						</a>
						<a title="Eliminar?" href="eliminar_municipio.php? nombre=<?php echo $row['nombre']; ?>">
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
				$result=$con->query("SELECT * FROM municipio");
			?>
			<?php
			if($result->num_rows > 0)
			{
			?>
		
		<table border="1" >
			<thead>
				<tr bgcolor="#33b5e5">
					<th>CODIGO</th>
					<th>NOMBRE</th>
					<th>DEPARTAMENTO</th>
					<th>ACCIÓN</th>
				</tr>
			</thead>
		
			<?php
			while($row = $result->fetch_array())
			{
			?>

		<tbody>	
			<tr>
				<td data-label="Codigo"><?php echo $row['codigo_mun']; ?></td>
				<td data-label="Nombre"><?php echo $row['nombre']; ?></td>
				<td data-label="Departamento"><?php echo $row['codigo_dep']; ?></td>
				<td data-label="Acción">
					<a title="Editar?" href="editar_municipio.php? nombre=<?php echo $row['nombre']; ?>">
						<font size='2'>Editar</font>	
					</a>
					<a title="Eliminar?" href="eliminar_municipio.php? nombre=<?php echo $row['nombre']; ?>">
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