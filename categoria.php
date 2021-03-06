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
	<title>Categorias</title>
</head>

<body>

	<?php include("barramenu.php"); ?>	

	<div class="contenedor">
		<aside>
		<div class="container">
			<div class="form__top">
				<h2><span>Registro de Categoria</span></h2>
			</div>		
			<form class="form__reg"  method="post" action="registrar_categoria.php">
				<input class="input" id="codigo_categoria" name= "codigo_categoria" class="element text" type="text" value="" placeholder="Codigo" required>
				<input class="input" id="descripcion" name= "descripcion" class="element text" type="text" value="" placeholder="Descripcion" required>

	            <div class="btn__form">
	            	<input class="btn__submit" type="submit" name="submit" value="Registrar">
	            	<input class="btn__reset" type="reset" value="Limpiar">	
	            </div>
			</form>
		</div>
		</aside>

		<section class="main">
			<form id="form_1075005" class="appnitro"  method="post" action="categoria.php">
					<h2>Lista de Categorias</h2>
					<br>
				<ul >
					<div>
						<input id="descripcion" name="descripcion" class="element text medium" type="text" maxlength="255" value="" required /> 
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
				$descripcion=$_POST['descripcion'];
				$result=$con->query("SELECT * FROM categoria WHERE descripcion='$descripcion'");	
			?>

			<?php
			if($result->num_rows > 0)
			{
			?>
		<table border="1" >
			<thead>
				<tr bgcolor="#33b5e5">
					<th>CODIGO</th>
					<th>DESCRIPCIÓN</th>
					<th>ACCIÓN</th>
				</tr>
			</thead>
		
			<?php
			$row = $result->fetch_array();
			?>

			<tbody>
				<tr>
					<td data-label="Codigo"><?php echo $row['codigo_categoria']; ?></td>
					<td data-label="Descripción"><?php echo $row['descripcion']; ?></td>

					<td data-label="Acción">
						<a title="Editar?" href="editar_categoria.php? descripcion=<?php echo $row['descripcion']; ?>">
							<font size='2'>Editar</font>	
						</a>
						<a title="Eliminar?" href="eliminar_categoria.php? descripcion=<?php echo $row['descripcion']; ?>">
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
				include("conexion.php");
				$con=conectarse();
				$result=$con->query("SELECT * FROM categoria");
			?>
			<?php
			if($result->num_rows > 0)
			{
			?>
		
		<table border="1" >
			<thead>
				<tr bgcolor="#33b5e5">
					<th>CODIGO</th>
					<th>DESCRIPCIÓN</th>
					<th>ACCIÓN</th>
				</tr>
			</thead>
		
			<?php
			while($row = $result->fetch_array())
			{
			?>

		<tbody>	
			<tr>
				<td data-label="Codigo"><?php echo $row['codigo_categoria']; ?></td>
				<td data-label="Descripción"><?php echo $row['descripcion']; ?></td>

				<td data-label="Acción">
					<a title="Editar?" href="editar_categoria.php? descripcion=<?php echo $row['descripcion']; ?>">
						<font size='2'>Editar</font>	
					</a> 
					<a title="Eliminar?" href="eliminar_categoria.php? descripcion=<?php echo $row['descripcion']; ?>">
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