<?php 
	$servidor = "localhost";
	$usuario = "alejandro";
	$passwd = "perez";
	$db = "alejandro";
	$conexion = mysqli_connect($servidor, $usuario, $passwd, $db) or die("MYSQL dice: " . mysqli_error($conexion));

	$sql = "INSERT INTO ap_componentes (ap_clave, ap_codigo) 
			VALUES ('{$_POST['clave']}', '{$_POST['codigo']}')";

		$resultado = mysqli_query($conexion, $sql);
		mysqli_close($conexion);
?>