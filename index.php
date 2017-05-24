<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Ingreso</title>
  <link rel="stylesheet" href="css/menu.css">
</head>

<body>

<div class="pen-title">
  <h1>SistemasGT</h1><span>DISTRIBUIDORA FLOR DEL PAISAJE</span>
</div>
<form id="form_1075005" class="appnitro"  method="post" action="index.php">
<div class="module form-module">
  <div class=""></i>
  </div>
    <div class="form">
      <h2><center>Ingresar al Sistema</center></h2>
      <form>
        <input id="usuario" name="usuario" type="text" maxlength="255" value="" required placeholder="Usuario"/>
        <input id="clave" name="clave" type="password" maxlength="255" value="" required placeholder="Contraseña"/>
        <button id="saveForm" class="button_text" type="submit" name="submit" value="Aceptar">Aceptar</button>
      </form>
    </div>
</div>
</form>
</body>

<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['usuario']) || empty($_POST['clave'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['usuario'];
$password=$_POST['clave'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include("conexion.php");
$con=conectarse();
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = $con->real_escape_string($username);
$password = $con->real_escape_string($password);


// SQL query to fetch information of registerd users and finds user match.
$query = $con->query("select * from usuario where clave='$password' AND usuario='$username'");
$rows = $query->num_rows;
if ($rows == 1) {
$r=$query->fetch_array();
$nom = $r['nombre'];
$ape = $r['apellido'];
$rol = $r['tipousuario']; 
$_SESSION['ok']="ok";
$_SESSION['ccusuario']=$username;
$_SESSION['nomusuario']=$nom; // Initializing Session
$_SESSION['apeusuario']=$ape;
$_SESSION['rol']=$rol;
$query->free();
header("location: almacen.php"); // Redirecting To Other Page
} else {
$error = "Usuario y clave no valido";
header("location: index.php"); 
}
}
}
?>
</html>