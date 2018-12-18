<?php 
	$servidor = "localhost";
	$usuario = "alejandro";
	$passwd = "perez";
	$db = "alejandro";
	$conexion = mysqli_connect($servidor, $usuario, $passwd, $db) or die("MYSQL dice: " . mysqli_error($conexion));
	
	$sql = "INSERT INTO ap_productos (ap_codigo, ap_nombre, ap_descripcion, ap_precio) VALUES ('{$_POST['codigo']}', '{$_POST['nombre']}', '{$_POST['descripcionProducto']}', '{$_POST['precio']}')";

	$resultado = mysqli_query($conexion, $sql);

	echo $resultado;
	
	mysqli_close($conexion);
?>