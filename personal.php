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
	<title>Usuarios</title>
</head>

<body>

	<?php include("barramenu.php"); ?>	

	<div class="contenedor">
		<aside>
		<div class="container">
			<div class="form__top">
				<h2><span>Registro de Usuario</span></h2>
			</div>		
			<form class="form__reg"  method="post" action="registrar_personal.php">
				<input class="input" id="nombre" name= "nombre" class="element text" type="text" value="" placeholder="Nombre" required>
				<input class="input" id="apellido" name= "apellido" class="element text" type="text" value="" placeholder="apellido" required>
				<input class="input" id="cargo" name= "cargo" class="element text" type="text" value="" placeholder="Cargo" required>
				<input class="input" id="usuario" name= "usuario" class="element text" type="text" value="" placeholder="Usuario" required>
				<input class="input" id="clave" name= "clave" class="element text" type="password" value="" placeholder="Contraseña" required>
				<label class="description" for="element_1">Tipo de Usuario </label>
				<select class="input" id="tipousuario" name="tipousuario" required > 
					<option value="" selected="selected">Seleccione</option>
					<option value="Administrador" >Administrador</option>
					<option value="Vendedor" >Vendedor</option>
					<option value="Bodeguero" >Bodeguero</option>
				</select>
				<input class="input" id="fecha" name="fecha" class="element text" type="text"  value="<?php echo date("m/d/Y"); ?>" size="10" placeholder="Fecha" required>
	            <div class="btn__form">
	            	<input class="btn__submit" type="submit" name="submit" value="Registrar">
	            	<input class="btn__reset" type="reset" value="Limpiar">	
	            </div>
			</form>
		</div>
		</aside>

		<section class="main">
			<form id="form_1075005" class="appnitro"  method="post" action="personal.php">
					<h2>Lista de Usuarios</h2>
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
				$usuario=$_POST['usuario'];
				$result=$con->query("SELECT * FROM usuario WHERE usuario='$usuario'");
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
					<th>CARGO</th>
					<th>FECHA REGISTRO</th>
					<th>USUARIO</th>
					<th>TIPO DE USUARIO</th>
					<th>ACCIÓN</th>
				</tr>
			</thead>
		
			<?php
			$row = $result->fetch_array();
			?>

			<tbody>
				<tr>
					<td data-label="Codigo"><?php echo $row['codigo_usuario']; ?></td>
					<td data-label="Nombre"><?php echo $row['nombre'].' '.$row['apellido']; ?></td>
					<td data-label="Cargo"><?php echo $row['cargo']; ?></td>
					<td data-label="Fecha"><?php echo $row['fecha']; ?></td>
					<td data-label="Usuario"><?php echo $row['usuario']; ?></td>
					<td data-label="Tipo Usuario"><?php echo $row['tipousuario']; ?></td>
					<td data-label="Acción">
						<a title="Editar?" href="editar_personal.php? usuario=<?php echo $row['usuario']; ?>">
							<font size='2'>Editar</font>	
						</a>
						<a title="Eliminar?" href="eliminar_personal.php? usuario=<?php echo $row['usuario']; ?>">
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
				$result=$con->query("SELECT * FROM usuario");
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
					<th>CARGO</th>
					<th>FECHA REGISTRO</th>
					<th>USUARIO</th>
					<th>TIPO DE USUARIO</th>
					<th>ACCIÓN</th>
				</tr>
			</thead>
		
			<?php
			while($row = $result->fetch_array())
			{
			?>

		<tbody>	
			<tr>
				<td data-label="Codigo"><?php echo $row['codigo_usuario']; ?></td>
				<td data-label="Nombre"><?php echo $row['nombre'].' '.$row['apellido']; ?></td>
				<td data-label="Cargo"><?php echo $row['cargo']; ?></td>
				<td data-label="Fecha"><?php echo $row['fecha']; ?></td>
				<td data-label="Usuario"><?php echo $row['usuario']; ?></td>
				<td data-label="Tipo Usuario"><?php echo $row['tipousuario']; ?></td>

				<td data-label="Acción">
					<a title="Editar?" href="editar_personal.php? usuario=<?php echo $row['usuario']; ?>">
						<font size='2'>Editar</font>	
					</a> 
					<a title="Eliminar?" href="eliminar_personal.php? usuario=<?php echo $row['usuario']; ?>">
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