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
	<title>Productos</title>
</head>

<body>

	<?php include("barramenu.php"); ?>	

	<div class="contenedor">
		<aside>
		<div class="container">
			<div class="form__top">
				<h2><span>Registro de Productos</span></h2>
			</div>		
			<form class="form__reg"  method="post" action="registrar_producto.php">
				<input class="input" id="codigo_producto" name= "codigo_producto" class="element text" type="text" value="" placeholder="Codigo" required>
				<input class="input" id="nombre" name= "nombre" class="element text" type="text" value="" placeholder="Nombre" required>
				<input class="input" id="tamano" name= "tamano" class="element text" type="text" value="" placeholder="Tamaño" required>
				<input class="input" id="preciocosto" name= "preciocosto" class="element text" type="text" value="" placeholder="Precio Costo" required>
				<input class="input" id="precioventa" name= "precioventa" class="element text" type="text" value="" placeholder="Precio Venta" required>
		
					<label class="description" for="element_1">Categoria </label>
					<div>
						<select class="input" id="categorias" name="categorias" required>
							<?php
							include("conexion.php");
							$con=conectarse();	
							$result=$con->query("SELECT * FROM categoria order by nombre asc");
							?>
							<option value="0" selected="selected">Seleccione</option>
							<?php while ($row=mysqli_fetch_array($result)){ ?>
							<option value="<?php echo $row['codigo_categoria']?>"><?php echo $row['description']?></option>
							<?php }?>				
						</select>
					</div> 

					<label class="description" for="element_2">Proveedor </label>
					<div>
						<select class="input" id="proveedores" name="proveedores" required>
							<?php
							//include("conexion.php");
							//$con=conectarse();	
							$result=$con->query("SELECT * FROM proveedor order by nombre asc");
							?>
							<option value="0" selected="selected">Seleccione</option>
							<?php while ($row=mysqli_fetch_array($result)){ ?>
							<option value="<?php echo $row['nit_proveedor']?>"><?php echo $row['nombre']?></option>
							<?php }?>
						</select>
				</div> 

	            <div class="btn__form">
	            	<input class="btn__submit" type="submit" name="submit" value="Registrar">
	            	<input class="btn__reset" type="reset" value="Limpiar">	
	            </div>
			</form>
		</div>
		</aside>

		<section class="main">
			<form id="form_1075005" class="appnitro"  method="post" action="productos.php">
					<h2>Lista de Productos</h2>
					<br>
				<ul >
					<div>
						<input id="codigo_producto" name="codigo_producto" class="element text medium" type="text" maxlength="255" value="" required /> 
						<label>Codigo de Barra</label>
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
				$codigo_producto=$_POST['codigo_producto'];
				$result=$con->query("SELECT p.*, p2.descripcion as des FROM producto p inner join categoria p2 on p.codigo_categoria=p2.codigo_categoria");
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
					<th>PRECIO COSTO</th>
					<th>PRECIO VENTA</th>
					<HTML<th>CATEGORIA</th>
					<!--<th>PROVEEDOR</th>-->
					<th>ACCIÓN</th>
				</tr>
			</thead>
		
			<?php
			$row = $result->fetch_array();
			?>

			<tbody>
				<tr>
					<td data-label="Codigo"><?php echo $row['codigo_producto']; ?></td>
					<td data-label="Nombre"><?php echo $row['nombre'].' '.$row['tamano']; ?></td>
					<td data-label="Precio Costo"><?php echo $row['precio_costo']; ?></td>
					<td data-label="Precio Venta"><?php echo $row['precio_venta']; ?></td>
					<td data-label="Categoria"><?php echo $row['des']; ?></td>
					<!--<td data-label="Proveedor"><?php echo $row['nit_proveedor']; ?></td>-->
					
					<td data-label="Acción">
						<a title="Editar?" href="editar_producto.php? codigo_producto=<?php echo $row['codigo_producto']; ?>">
							<font size='2'>Editar</font>	
						</a>
						<a title="Eliminar?" href="eliminar_producto.php? codigo_producto=<?php echo $row['codigo_producto']; ?>">
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
				$result=$con->query("SELECT p.*, p2.descripcion as des FROM producto p inner join categoria p2 on p.codigo_categoria=p2.codigo_categoria");
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
					<th>PRECIO COSTO</th>
					<th>PRECIO VENTA</th>
					<th>CATEGORIA</th>
					<!--<th>PROVEEDOR</th>-->
					<th>ACCIÓN</th>
				</tr>
			</thead>
		
			<?php
			while($row = $result->fetch_array())
			{
			?>

		<tbody>	
			<tr>
				<td data-label="Codigo"><?php echo $row['codigo_producto']; ?></td>
				<td data-label="Nombre"><?php echo $row['nombre'].' '.$row['tamano']; ?></td>
				<td data-label="Precio Costo"><?php echo $row['precio_costo']; ?></td>
				<td data-label="Precio Venta"><?php echo $row['precio_venta']; ?></td>
				<td data-label="Categoria"><?php echo $row['des']; ?></td>
				<!--<td data-label="Proveedor"><?php echo $row['nit_proveedor']; ?></td>-->

				<td data-label="Acción">
					<a title="Editar?" href="editar_producto.php? codigo_producto=<?php echo $row['codigo_producto']; ?>">
						<font size='2'>Editar</font>	
					</a> 
					<a title="Eliminar?" href="eliminar_producto.php? codigo_producto=<?php echo $row['codigo_producto']; ?>">
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