<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Departamento</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	<table>
	<tr>
	<td><a href="personal.php">USUARIOS</a></td>
	<td><a href="clientes.php">CLIENTES</a></td>
	<td><a href="productos.php">PRODUCTOS</a></td>
	<td><a href="Proveedores.php">PROVEEDORES</a></td>
	<td><a href="ventas.php">VENTAS</a></td>
	<td><a href="compras.php">COMPRAS</a></td>
	<td><a href="registrar_municipio.php">MUNICIPIOS</a></td>
	</tr>
	</table>
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Registrar Departamento</a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="registrar_departamento2.php">
					<div class="form_description">
			<h2>Registrar Departamento</h2>
			<p></p>
		</div>						
			<ul >
				
		<li id="li_2" >
		<label class="description" for="element_3">Nombre </label>
		<div>
			<input id="cargo" name="nombre" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>		
		<!--datos del select-->
		
					<li class="buttons">
			    <input type="hidden" name="form_id" value="1075005" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Registrar" />
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

	<img id="bottom" src="css/bottom.png" alt="">
	</body>
<?php
}
else
{
	header("location: login.php");
}
?>
</html>