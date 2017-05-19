<?php

$dbh = mysql_connect("localhost","root" ,"");
$db = mysql_select_db("flor_del_paisaje");

$consulta = "SELECT * from usuario WHERE codigo_usuario = ".$_GET['codigo_usuario'];
$query = mysql_query($consulta);
$fila = mysql_fetch_array($query);
    while ($fila = mysql_fetch_array($query)) {
    echo '<option value="'.$fila['nombre'].'">'.$fila['nombre'].'</option>';
}


?>