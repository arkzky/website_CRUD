<?php  
	session_start();
	if( ! isset( $_SESSION['usuario'] ) )
	{
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema AGPP</title>
	<link rel="stylesheet" href="estilo.css">

</head>
<body>
	<div class="contenedor">
        <div class="padding-izquierda"></div>

		<nav class="navegador">
			<ul>
				<li><a class="logo" href="inicio.php"><img src="img/AGPP.png"></a></li>
				<li class="activaVerde" id="verde" ><a href="inicio.php">Inicio</a></li>
				<li id="amarillo"><a href="verProductos.php">Ver Productos</a></li>
				<li id="azulClaro"><a href="verPartes.php">Ver Partes</a></li>
				<li id="azulMarino"><a href="agregarProductos.php">Agregar Productos</a></li>
				<li id="rosa"><a href="cerrarSesion.php">Cerrar Sesión</a></li>
			</ul>
		</nav>

		<div class="padding-derecha"></div>
	</div>

	<h1>Bienvenido al Sistema AGPP	</h1>

	<div class="camara">
		<h2>Examen final de la materia de Programación Web</h2>
		<img src="img/tecnologias.png" alt="">

		<h4>Autor: Alejandro Gibran Pérez Pérez</h4>
	</div>
</body>
</html>