<?php 
	$servidor = "localhost";
	$usuario = "alejandro";
	$passwd = "perez";
	$db = "alejandro";
	$conexion = mysqli_connect($servidor, $usuario, $passwd, $db) or die("MYSQL dice: " . mysqli_error($conexion));

	$sql = "INSERT INTO ap_partes (ap_clave, ap_descripcion, ap_precio) 
			VALUES ('{$_POST['clave']}', '{$_POST['descripcionPieza']}', '{$_POST['precio']}')";

		$resultado = mysqli_query($conexion, $sql);
		mysqli_close($conexion);
?>