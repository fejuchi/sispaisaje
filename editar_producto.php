<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
if(isset($_GET['id']))
{
	include("conexion.php");
	$con=conectarse();
	$id=$_GET['id'];
	$result=$con->query("SELECT * FROM producto WHERE codigo_producto='$id'");
	$row = $result->fetch_array();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Modificar Datos Del Producto</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Modificar Datos Del Producto</a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="editar_producto.php">
					<div class="form_description">
			<h2>Modificar Datos Del Producto</h2>
			<p></p>
		</div>						
			<ul >
			
		<li id="li_1" >
		<label class="description" for="element_1">ID </label>
		<span>
			<input id="codigo_producto" name= "id" class="element text" maxlength="255" size="20" value="<?php echo $row['codigo_producto']; ?>" required />
			<label>Codigo de Barra</label>
		</li>
		<li id="li_2" >
		<label class="description" for="element_1">Nombre </label>
		<div>
			<input id="cc" name="nombre" class="element text medium" type="text" maxlength="255" value="<?php echo $row['nombre']; ?>" required /> 
		</div> 
		</li>			
		<li id="li_3" >
		<label class="description" for="element_3">Tamaño </label>
		<div>
			<input id="cargo" name="tamano" class="element text medium" type="text" maxlength="255" value="<?php echo $row['tamano']; ?>" required /> 
		</div> 
		</li>
		<li id="li_4" >
		<label class="description" for="element_4">Precio Costo </label>
		<div>
			<input id="password" name="preciocosto" class="element text medium" type="text" maxlength="255" value="<?php echo $row['precio_costo']; ?>" required /> 
		</div> 
		</li>
		<li id="li_6" >
		<label class="description" for="element_6">Precio Venta </label>
		<div>
			<input id="password" name="precioventa" class="element text medium" type="text" maxlength="255" value="<?php echo $row['precio_venta']; ?>" required /> 
		</div> 
		</li>
		<li id="li_7" >
		<label class="description" for="element_7">Categoria </label>
		<div>
			<input id="password" name="categoria" class="element text medium" type="text" maxlength="255" value="<?php echo $row['codigo_categoria']; ?>" required /> 
		</div> 
		</li>

		<li id="li_7" >
		<label class="description" for="element_7">Peoveedor </label>
		<div>
			<input id="password" name="proveedor" class="element text medium" type="text" maxlength="255" value="<?php echo $row['nit_proveedor']; ?>" required /> 
		</div> 
		</li>
		
					
					<li class="buttons">
			    <input type="hidden" name="form_id" value="1075005" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Modificar" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			
		</div>
	</div>
	<img id="bottom" src="css/bottom.png" alt="">
	</body>
<?php
}
else
{
	if(isset($_POST['submit']))
	{
		include("conexion.php");
	    $con=conectarse();
		$id=$_POST['id'];
		$nombre=$_POST['nombre'];
		$tamano=$_POST['tamano'];
		$preciocosto=$_POST['preciocosto'];
		$precioventa=$_POST['precioventa'];
		$categoria=$_POST['categoria'];		
		$proveedor=$_POST['proveedor'];	
		$result=$con->query("UPDATE producto SET nombre='$nombre', tamano='$tamano', precio_costo='$preciocosto', precio_venta='$precioventa', codigo_categoria='$categoria', nit_proveedor='$proveedor' WHERE codigo_producto='$id'");
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
	header("location: login.php");
}
?>
</html>