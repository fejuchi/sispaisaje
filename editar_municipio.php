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
	$result=$con->query("SELECT * FROM municipio WHERE nombre='$nombre'");
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
				<h2><span>Modificar Municipio</span></h2>
			</div>		
			<form class="form__reg"  method="post" action="editar_municipio.php">
				<input class="input" id="nombre" name= "nombre" class="element text" type="text" value="<?php echo $row['nombre']; ?>" placeholder="Nombre" required>
				<label class="description" for="element_4">Departamento</label>
				<div>
					<select class="input" id="departamento" name="departamento" required>
						<?php			
						$result2=$con->query("SELECT * FROM departamento");
						while($row2 = $result2->fetch_array())
						{
							?>
							 <option  value="<?php echo $row2['codigo_dp']; ?>"  <?php if($row['codigo_dep'] == $row2['codigo_dep']){ ?> selected <?php } ?> > <?php echo $row2['descripcion']; ?> </option> 
							<?php
						}
						?>
					</select> 
				</div> 


	            <div class="btn__form">
	            	<input class="btn__submit" type="submit" name="submit" value="Modificar">
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
					<th>CODGIO</th>
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
				//*include("conexion.php");
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
	if(isset($_POST['submit']))
	{
		include("conexion.php");
			$con=conectarse();
	   		$nombre=$_POST['nombre'];
			$depto=$_POST['departamento'];	

		$result=$con->query("UPDATE municipio SET nombre='$nombre', codigo_dep='$depto' WHERE codigo_dep='$depto'");
	}
?>
	<meta http-equiv='refresh' content='1; url=municipio.php' />
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
			<meta http-equiv='refresh' content='0; url=municipio.php' />
		<?php
	}	
}

else
{
	header("location: index.php");
}
?>
</html>