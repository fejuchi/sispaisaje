<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Registrar Cliente</title>
<script type="text/javascript" language="javascript" src="js/ajax.js"></script>	
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="view.js"></script>
</head>

<body id="main_body" >
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Registrar Cliente</a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="registrar_cliente2.php">
			<div class="form_description">
			<h2>Registrar Cliente</h2>
			<p></p>
			</div>

	<ul>
		<li id="li_1" >
		<label class="description" for="element_1">NIT </label>
		<div>
			<input id="nit_cliente" name="nit_cliente" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>
		<li id="li_2" >
		<label class="description" for="element_2">Nombre </label>
		<span>
			<input id="nombre" name= "nombre" class="element text" maxlength="255" size="20" value="" required />
			<label>Nombres</label>
		</span>
		<span>
			<input id="apellido" name= "apellido" class="element text" maxlength="255" size="20" value="" required />
			<label>Apellidos</label>
		</span> 
		</li>		
		<li id="li_3" >
		<label class="description" for="element_3">Direccion </label>
		<div>
			<input id="direccion" name="direccion" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>
		<li id="li_4" >
		<label class="description" for="element_4">Telefono </label>
		<div>
			<input id="telefono" name="telefono" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>		
		<li id="li_5" >
		<label class="description" for="element_5">Email </label>
		<div>
			<input id="email" name="email" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>





	</ul>
		</form>

		<?php
		include("conexion.php");
		$con=conectarse();	
		$result=$con->query("SELECT * FROM departamento order by nombre asc");
	?>

			<ul>
				<form id="form_1075005" name="form5" action="" class="appnitro"  method="post" action="registrar_cliente2.php">
					<label class="description" for="element_7">Departamento </label>
					<div>
						<select class="" name="departamento" id="departamento" onchange="from(document.form5.departamento.value,'midiv','municipio.php')" required>
							<option value="0">Seleccione</option>
							<?php while ($row=mysqli_fetch_array($result)){ ?>
							<option value="<?php echo $row['codigo_dep']?>"><?php echo $row['nombre']?></option>
							<?php }?>				
						</select>	
					</div>
					<div id="midiv">
					</div>

					<li class="buttons">
					<input type="hidden" name="form_id" value="1075005" />
					<input id="saveForm" class="button_text" type="submit" name="submit" value="Registrar" />
					</li>

				</form>	
			</ul>

					<div id="footer">
					</div>
	</div>
					<img id="bottom" src="css/bottom.png" alt="">
</body>

<?php
}
else
{
	header("location: index.php");
}
?>
</html>