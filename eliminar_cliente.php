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
			$con->query("DELETE FROM cliente WHERE nombre='$nombre'");
			header("Location: cliente.php");
		}		
		
	}
	else{
		?>
			<script language="javascript"type="text/javascript">
						alert("Usuario no autorizado");
			</script>
			<meta http-equiv='refresh' content='1; url=cliente.php' />
		<?php
	}
		?>
		<meta http-equiv='refresh' content='0; url=cliente.php' />
		<?php
}
else
{
	header("location: index.php");
}
		?>