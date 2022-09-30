<?php
	require_once 'conn.php';
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	/* echo $username;
	echo $password; */ //linea de debug
	if (isset($username) && isset($password)){
		$Object = new DateTime();  
		$Object->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
		$fecha_modificacion = $Object->format("Y-m-d G:i:s");
		if($_GET['task_id'] != ""){
			$task_id = $_GET['task_id'];
			$sql = "UPDATE `tareas` SET `estado` = 1, `fecha_modificacion` = ? WHERE `id` = ?";
    		$sentencia = $conn->prepare($sql);
    		$sentencia->bind_param('si', $fecha_modificacion, $task_id);
    		$sentencia->execute();
    		$resultado = $sentencia->get_result();
			header("Location: tareas.php");
		}
		$sentencia->close();
		$resultado->free();
		$conn->close();
	}
	else {
		header("Location: error.php");
	}
?>