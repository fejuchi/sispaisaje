<?php
	
	require ("../conexion.php");
	
	$id_estado= $_POST['codigo_dep'];
	
	$queryM = "SELECT codigo_mun, nombre FROM municipio WHERE codigo_dep = '$id_estado' ORDER BY municipio";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar Municipio</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['codigo_mun']."'>".$rowM['municipio']."</option>";
	}
	
	echo $html;
?>		