<?php
	require_once 'conn.php';
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	/*echo $username;
	echo $password; */ //linea de debug
	if (isset($username) && isset($password)){
		$Object = new DateTime();  
		$Object->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
		$fecha_modificacion = $Object->format("Y-m-d G:i:s");
		if($_GET['task_id'] != ""){
			$descripcion_tarea = $_GET['descripcion'];
			$task_id = $_GET['task_id'];
			echo $descripcion_tarea;
		}
	}
			/*$sql = "UPDATE `tareas` SET `fecha_modificacion` = ?, `descripcion` = ? WHERE `id` = ?";
    		$sentencia = $conn->prepare($sql);
    		$sentencia->bind_param('ssi', $fecha_modificacion, $descripcion_tarea, $task_id);
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
	}*/
?>