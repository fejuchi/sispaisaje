	<?php
session_start();
if($_SESSION['ok']=="ok")
{
	if($_SESSION['rol']=="Administrador")
	{
		if(isset($_GET['descripcion']))
		{
			$descripcion = $_GET['descripcion'];	
			include("conexion.php");
			$con=conectarse();
			$con->query("DELETE FROM categoria WHERE descripcion='$descripcion'");
			header("Location: categoria.php");
		}		
		
	}
	else{
		?>
			<script language="javascript"type="text/javascript">
						alert("Usuario no autorizado");
			</script>
			<meta http-equiv='refresh' content='1; url=categoria.php' />
		<?php
	}
		?>
		<meta http-equiv='refresh' content='0; url=categoria.php' />
		<?php
}
else
{
	header("location: index.php");
}
		?>