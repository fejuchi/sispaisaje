<?php
session_start();
if($_SESSION['ok']=="ok")
{
	if($_SESSION['rol']=="Administrador")
	{
		if(isset($_GET['nombre']))
		{
			$nombre = $_GET['nombre'];	
			include("conexion.php");
			$con=conectarse();
			$con->query("DELETE FROM municipio WHERE nombre='$nombre'");
			header("Location: municipio.php");
		}		
		
	}
	else{
		?>
			<script language="javascript"type="text/javascript">
						alert("Usuario no autorizado");
			</script>
			<meta http-equiv='refresh' content='1; url=municipio.php' />
		<?php
	}
		?>
		<meta http-equiv='refresh' content='0; url=municipio.php' />
		<?php
}
else
{
	header("location: index.php");
}
		?>