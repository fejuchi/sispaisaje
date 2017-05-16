<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Productos</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Productos</a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="productos.php">
					<div class="form_description">
			<h2>Productos</h2><a title=" Registrar Producto Nuevo? " href="registrar_producto.php">  <img src="css/newc.jpg">  </a>
			<p></p>
		</div>						
			<ul >
			
				
					<li class="buttons">
			    <input type="hidden" name="form_id" value="1075005" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Buscar" />
		</li>
			</ul>
			
		
		</form>	
		<div id="footer">
			
		</div>
	</div>
		
	<style>
	
	table
	{
		border: 2px solid #FF8000;		
		width: 100%;
    }
    
	h3
	{
		color: #FF8000;
		text-align: center;
		text-decoration: line-through;
	}
	img{
		 height: 18px;
         width: 18px;
	}
	
	</style>	
	
	<?php

		if(isset($_POST['submit']))
		{
			include("conexion.php");
			$con=conectarse();
			$id=$_POST['id'];
			$result=$con->query("SELECT * FROM producto WHERE codigo_producto='$id' ");
			
	?>
	
	<img id="top" src="css/top.png" alt="">
	<center><a href="almacen.php"><---</a></center>
	<div id="form_container">
	
		<?php
		if($result->num_rows > 0)
		{
		?>
		
		<table id="form_1075005" class="appnitro" cellspacing="8" cellpadding="3">
		
				
		<tr bgcolor="#FF8000">
		 <td align="center">ID</td>
		 <td align="center">NOMBRE PRODUCTO</td>
		 <td align="center">TAMAÑO</td>
		 <td align="center">PRECIO COSTO</td>
		 <td align="center">PRECIO VENTA</td>
		 <td align="center">CATEGORIA</td>
		 <td align="center">PROVEEDOR</td>
		 <td align="center">< - --- - ></td>
		</tr>
		
		<?php
		$row = $result->fetch_array();
		?>
			
			<tr>
			 <td align="center"><?php echo $row['codigo_producto']; ?></td>
			 <td align="center"><?php echo $row['nombre'];?></td>
			 <td align="center"><?php echo $row['tamano']; ?></td>
			 <td align="center"><?php echo $row['precio_costo']; ?></td>
			 <td align="center"><?php echo $row['precio_venta']; ?></td>
			 <td align="center"><?php echo $row['codigo_categoria']; ?></td>
			 <td align="center"><?php echo $row['nit_proveedor']; ?></td>
			 <td align="center"><a title=" Eliminar? " href="eliminar_producto.php?id=<?php echo $row['codigo_producto']; ?>"><font size='5' color="#FF8071">x</font></a>&nbsp <a title=" Editar? " href="editar_producto.php?id=<?php echo $row['codigo_producto']; ?>">  <img src="css/edit.jpg">  </a> </td>
			</tr>
			<tr>
				<td align="center" colspan="9"><a href="productos.php"><--</a></td>
			</tr>
		</table>	
		
	</div>
      
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
			
			$result=$con->query("SELECT * FROM producto");
			
	?>
	
	<img id="top" src="css/top.png" alt="">
	<center><a href="almacen.php"><---</a></center>
	<div id="form_container">
	
		<?php
		if($result->num_rows > 0)
		{
		?>
		
		<table id="form_1075005" class="appnitro" cellspacing="8" cellpadding="3">
		
				
		<tr bgcolor="#FF8000">
		 <td align="center">ID</td>
		 <td align="center">NOMBRE</td>
		 <td align="center">TAMAÑO</td>
		 <td align="center">PRECIO COSTO</td>
		 <td align="center">PRECIO VENTA</td>
		 <td align="center">CATEGORIA</td>
		 <td align="center">PROVEEDOR</td>
		 
		</tr>
		
		<?php
		while($row = $result->fetch_array())
		{
		?>
			
			<tr>
			 <td align="center"><?php echo $row['codigo_producto']; ?></td>
			 <td align="center"><?php echo $row['nombre'];?></td>
			 <td align="center"><?php echo $row['tamano']; ?></td>
			 <td align="center"><?php echo $row['precio_costo']; ?></td>
			 <td align="center"><?php echo $row['precio_venta']; ?></td>
			 <td align="center"><?php echo $row['codigo_categoria']; ?></td>
			 <td align="center"><?php echo $row['nit_proveedor']; ?></td>
			 
			 <td align="center"><a title=" Eliminar? " href="eliminar_producto.php?id=<?php echo $row['codigo_producto']; ?>"><font size='5' color="#FF8071">x</font></a>&nbsp <a title=" Editar? " href="editar_producto.php?id=<?php echo $row['codigo_producto']; ?>">  <img src="css/edit.jpg">  </a> </td>
			</tr>
		<?php
		}
		?>		
		</table>	
		
	</div>
      
	<?php
		}
		}		
		
	?>	
		
	<img id="bottom" src="css/bottom.png" alt="">
	<center><a href="almacen.php"><---</a></center>
	</body>
<?php
}
else
{
	header("location: login.php");
}
?>
</html>