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
	<title>Partes</title>
	<link rel="stylesheet" href="estilo.css">
	<script src="jquery-3.3.1.js"></script>
</head>
<body>
<div class="contenedor">
		<nav class="navegador">
			<ul>
				<li><a class="logo" href="inicio.php"><img src="img/AGPP.png"></a></li>
				<li id="verde" ><a href="inicio.php">Inicio</a></li>
				<li id="amarillo"><a href="verProductos.php">Ver Productos</a></li>
				<li class="activaAzulClaro" id="azulClaro"><a href="verPartes.php">Ver Partes</a></li>
				<li id="azulMarino"><a href="agregarProductos.php">Agregar Productos</a></li>
				<li id="rosa"><a href="cerrarSesion.php">Cerrar Sesión</a></li>
			</ul>
		</nav>
	</div>

	<h2>Tabla de Partes</h2>

	<div class="tabla">
		<?php 
			require_once 'biblioteca.php';
			$servidor = "localhost";
			$usuario = "alejandro";
			$passwd = "perez";
			$db = "alejandro";
			$conexion = mysqli_connect($servidor, $usuario, $passwd, $db) or die("MYSQL dice: " . mysqli_error($conexion));
			$sql = "SELECT * FROM ap_partes";

			//Paso 4) Ejecutar la consulta
			$resultado = mysqli_query($conexion, $sql);

			//Paso 5) Explorar el resultado
			$tabla = array();
	         //Paso 5) Explorar el resultado
	         while($renglon=mysqli_fetch_array($resultado, MYSQLI_ASSOC) ){
	             $tabla[] = $renglon;
	         }
	         echo recorrerTabla($tabla);

			mysqli_close($conexion);
		?>
	 </div>
	 <br>
	 <div class="logo">
	 	<button class="btn" id="borrarPiezas">Borrar Piezas</button>
	 </div>
	 <script src="AJAX.js"></script>
</body>
</html>