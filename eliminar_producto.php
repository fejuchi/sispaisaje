<?php
session_start();
if($_SESSION['ok']=="ok")
{
	if($_SESSION['rol']=="Administrador")
	{		
		if(isset($_GET['codigo_producto']))
		{
			$codigo_producto = $_GET['codigo_producto'];	
			include("conexion.php");
			$con=conectarse();
			$con->query("DELETE FROM producto WHERE codigo_producto='$codigo_producto'");
		}
	}
	else
	{
		?>
			<script language="javascript"type="text/javascript">
						alert("Usuario no autorizado");
			</script>
			<meta http-equiv='refresh' content='1; url=productos.php' />
		<?php
	}		
}
else
	{
	  header("location: index.php");
	}
?>
<meta http-equiv='refresh' content='0; url=productos.php' />