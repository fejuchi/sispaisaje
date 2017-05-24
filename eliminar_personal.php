<?php
session_start();
if($_SESSION['ok']=="ok")
{
	if($_SESSION['rol']=="Administrador")
	{		
		if(isset($_GET['usuario']))
		{
			$usuario = $_GET['usuario'];	
			include("conexion.php");
			$con=conectarse();
			$con->query("DELETE FROM usuario WHERE usuario='$usuario'");
		}
	}
	else
	{
		?>
			<script language="javascript"type="text/javascript">
						alert("Usuario no autorizado");
			</script>
		<?php
	}		
}
else
	{
	  header("location: index.php");
	}
?>
<meta http-equiv='refresh' content='0; url=personal.php' />