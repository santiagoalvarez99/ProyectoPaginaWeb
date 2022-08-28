<?php
	require_once 'conn.php';
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$Object = new DateTime();  
	$Object->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
	$fecha_creacion = $Object->format("Y-m-d");
	$sql = "select id from usuarios where nombre_user = ? and password = ?";
    $sentencia = $conn->prepare($sql);
    $sentencia->bind_param('ss', $username, $password);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
	while ($row = $resultado->fetch_assoc()) {
		$id = $row['id'];
		if(ISSET($_POST['add'])){
			if($_POST['task'] != ""){
				$task = $_POST['task'];
				$conn->query("INSERT INTO `tareas` VALUES('', '$task', 0 , '$id', '$fecha_creacion', NULL)");
				header("Location:tareas.php");
			}
		}
	}	
	$sentencia->close();
    $resultado->free();
	$conn->close();
?>