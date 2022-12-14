<?php
	require_once 'conn.php';
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	/*echo $username;
	echo $password;*/  //linea de debug
	if (isset($username) && isset($password)){
		$Object = new DateTime();  
		$Object->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
		$fecha_creacion = $Object->format("Y-m-d G:i:s");
		$sql = "select id from usuarios where nombre_user = ? and password = ?";
    	$sentencia = $conn->prepare($sql);
    	$sentencia->bind_param('ss', $username, $password);
    	$sentencia->execute();
    	$resultado = $sentencia->get_result();
		while ($row = $resultado->fetch_assoc()) {
			$id = $row['id'];
			echo $id;
			if(ISSET($_POST['add'])){
				if($_POST['task'] != ""){
					$task = $_POST['task'];
					$sql_insert = "INSERT INTO `tareas` VALUES('', ?, 0 , ?, ?, NULL)";
    				$sentencia_insert = $conn->prepare($sql_insert);
    				$sentencia_insert->bind_param('sis', $task, $id, $fecha_creacion);
    				$sentencia_insert->execute();
    				$resultado_insert = $sentencia_insert->get_result();
					header("Location: tareas.php");
				}
			}	
		$sentencia->close();
    	$resultado->free();
		$sentencia_insert->close();
    	$resultado_insert->free();
		$conn->close();
		}
	}
	else {
		header("Location: error.php");
	}
	
?>