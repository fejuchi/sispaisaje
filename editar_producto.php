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
if(isset($_GET['codigo_producto']))
{
	include("conexion.php");
	$con=conectarse();
	$codigo_producto=$_GET['codigo_producto'];
	$result=$con->query("SELECT * FROM producto WHERE codigo_producto='$codigo_producto'");
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
	<title>Productos</title>
</head>

<body>
	
	<?php include("barramenu.php"); ?>	
	
	<div class="contenedor">
		<aside>
		<div class="container">
			<div class="form__top">
				<h2><span>Modificar Producto</span></h2>
			</div>		
			<form class="form__reg"  method="post" action="editar_producto.php">
				<input class="input" id="codigo_producto" name= "codigo_producto" class="element text" type="text" value="<?php echo $row['codigo_producto']; ?>" placeholder="Codigo" required>
				<input class="input" id="nombre" name= "nombre" class="element text" type="text" value="<?php echo $row['nombre']; ?>" placeholder="Nombre" required>
				<input class="input" id="tamano" name= "tamano" class="element text" type="text" value="<?php echo $row['tamano']; ?>" placeholder="Tamaño" required>
				<input class="input" id="preciocosto" name= "preciocosto" class="element text" type="text" value="<?php echo $row['precio_costo']; ?>" placeholder="Precio Costo" required>
				<input class="input" id="precioventa" name= "precioventa" class="element text" type="text" value="<?php echo $row['precio_venta']; ?>" placeholder="Precio Venta" required>

				<label class="description" for="element_4">Categoria</label>
				<div>
					<select class="input" id="categorias" name="categorias" required>
						<?php			
						$result2=$con->query("SELECT * FROM categoria");
						while($row2 = $result2->fetch_array())
						{
							?>
							 <option  value="<?php echo $row2['codigo_categoria']; ?>"  <?php if($row['codigo_categoria'] == $row2['codigo_categoria']){ ?> selected <?php } ?> > <?php echo $row2['descripcion']; ?> </option> 
							<?php
						}
						?>
					</select> 
				</div> 

				<label class="description" for="element_4">Proveedor</label>
				<div>
					<select class="input" id="proveedores" name="proveedores" required>
						<?php			
						$result2=$con->query("SELECT * FROM proveedor");
						while($row2 = $result2->fetch_array())
						{
							?>
							 <option  value="<?php echo $row2['nit_proveedor']; ?>"  <?php if($row['nit_proveedor'] == $row2['nit_proveedor']){ ?> selected <?php } ?> > <?php echo $row2['nombre']; ?> </option> 
							<?php
						}
						?>
					</select> 
				</div> 
				</li>


	            <div class="btn__form">
	            	<input class="btn__submit" type="submit" name="submit" value="Modificar">
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
					<th>CATEGORIA</th>
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
	if(isset($_POST['submit']))
	{
		include("conexion.php");
	    $con=conectarse();
		$codigo_producto=$_POST['codigo_producto'];
		$nombre=$_POST['nombre'];
		$tamano=$_POST['tamano'];
		$preciocosto=$_POST['preciocosto'];
		$precioventa=$_POST['precioventa'];
		$categorias=$_POST['categorias'];		
		$proveedores=$_POST['proveedores'];	
		$result=$con->query("UPDATE producto SET nombre='$nombre', tamano='$tamano', precio_costo='$preciocosto', precio_venta='$precioventa', codigo_categoria='$categorias', nit_proveedor='$proveedores' WHERE codigo_producto='$codigo_producto'");
	}
?>
	<meta http-equiv='refresh' content='1; url=productos.php' />
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
			<meta http-equiv='refresh' content='0; url=productos.php' />
		<?php
	}	
}

else
{
	header("location: index.php");
}
?>
</html>