<?php
	require_once 'conn.php';
	if (isset($_SESSION['username'])){
		$usernameSesion = $_SESSION['username'];
        $username = htmlspecialchars($usernameSesion); 
	}
	else {
		header("Location: error.php");
	}
	if (isset($_SESSION['password'])){
		$passwordSesion = $_SESSION['password'];
        $password = htmlspecialchars($passwordSesion); 
	}
	if($_GET['task_id']){
		$task_id = $_GET['task_id'];
		$sql = "DELETE FROM `tareas` WHERE `id` = $task_id";
    	$sentencia = $conn->prepare($sql);
    	$sentencia->bind_param('i', $task_id);
    	$sentencia->execute();
    	$resultado = $sentencia->get_result();
		header("Location: tareas.php");
	}	
	$sentencia->close();
	$resultado->free();
	$conn->close();
?>