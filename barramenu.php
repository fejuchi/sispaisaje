
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Menu</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="fonts.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/main.js"></script>
</head>

<body>
	<header>
		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-menu3"></span>Menú</a>
		</div>

		<nav>
			<ul>
				<li><a href="almacen.php"><span class="icon-home"></span>Inicio</a></li>
				<li class="submenu">
					<a href="#"><span class="icon-profile"></span>Administración<span class=""></span></a>
					<ul class="children">
						<li><a href="personal.php">Usuarios <span class="icon-users"></span></a></li>
						<li><a href="editar_almacen.php">Empresa <span class="icon-office"></span></a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><span class="icon-book"></span>Catálogo<span class=""></span></a>
					<ul class="children">
						<li><a href="cliente.php">Clientes <span class="icon-man-woman"></span></a></li>
						<li><a href="proveedores.php">Proveedores <span class="icon-address-book"></span></a></li>
						<li><a href="productos.php">Productos <span class="icon-price-tags"></span></a></li>
						<li><a href="categoria.php">Categorias <span class="icon-books"></span></a></li>
						<li><a href="municipio.php">Ubicación <span class="icon-location"></span></a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><span class="icon-file-text"></span>Facturación<span class=""></span></a>
					<ul class="children">
						<li><a href="ventas.php">Ventas <span class="icon-cart"></span></a></li>
						<li><a href="compras.php">Compras <span class="icon-clipboard"></span></a></li>
						<li><a href="#">Devoluciones <span class="icon-ticket"></span></a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><span class="icon-stats-bars"></span>Reportes<span class=""></span></a>
					<ul class="children">
						<li><a href="#">Reporte de Ventas <span class="icon-stats-dots"></span></a></li>
						<li><a href="#">Reporte de Compras <span class="icon-pie-chart"></span></a></li>
						<li><a href="#">Reporte de Compras <span class="icon-stats-bars2"></span></a></li>
						<li><a href="#">Reporte de Compras <span class="icon-table"></span></a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><span class="icon-info"></span>Ayuda<span class=""></span></a>
					<ul class="children">
						<li><a href="#">Información <span class="icon-file-text2"></span></a></li>
						<li><a href="#">Contacto <span class="icon-mail2"></span></a></li>
					</ul>
				</li>
					<li class="submenu">
					<a href="#"><span class="icon-key"></span>Login<span class=""></span></a>
					<ul class="children">
						<li><a href="close.php">Salir <span class="icon-exit"></span></a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>		
</body>
</html>
