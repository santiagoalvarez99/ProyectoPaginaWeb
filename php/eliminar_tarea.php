<?php
	require_once 'conn.php';
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	/* echo $username;
	echo $password; */ //linea de debug
	if (isset($username) && isset($password)){
		if($_GET['task_id']){
			$task_id = $_GET['task_id'];
			$sql = "DELETE FROM tareas WHERE id = ?";
    		$sentencia = $conn->prepare($sql);
    		$sentencia->bind_param('i', $task_id);
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