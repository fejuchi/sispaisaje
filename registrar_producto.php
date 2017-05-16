<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Registrar Producto</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Registrar Producto</a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="registrar_producto2.php">
					<div class="form_description">
			<h2>Registrar Producto</h2>
			<p></p>
		</div>						
			<ul >
			
		<li id="li_1" >
		<label class="description" for="element_1">ID </label>
		<span>
			<input id="codigo_producto" name= "id" class="element text" maxlength="255" size="20" value="" required />
			<label>Codigo de Barra</label>
		</li>		
		<li id="li_2" >
		<label class="description" for="element_2">Nombre Producto</label>
		<div>
			<input id="cargo" name="nombre" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>		
		<li id="li_3" >
		<label class="description" for="element_3">Tamaño </label>
		<div>
			<input id="password" name="tamano" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>
		<li id="li_4" >
		<label class="description" for="element_4">Precio Costo </label>
		<div>
			<input id="password" name="preciocosto" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>
		<li id="li_5" >
		<label class="description" for="element_5">Precio venta </label>
		<div>
			<input id="password" name="precioventa" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>

		<li id="li_6" >
		<label class="description" for="element_6">Categoria </label>
		<div>
			<input id="password" name="categoria" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>

		<li id="li_7" >

			<label class="description" for="element_7">Proveedor </label>
		<div>
			<input id="password" name="proveedor" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li

			
		</div> 
		</li>



		
		
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="1075005" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Registrar" />
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
	header("location: login.php");
}
?>
</html>