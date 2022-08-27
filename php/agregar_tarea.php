<?php
	require_once 'conn.php';
	if(ISSET($_POST['add'])){
		if($_POST['task'] != ""){
			$task = $_POST['task'];
 
			$conn->query("INSERT INTO `tareas` VALUES('', '$task', 0)");
			header("Location:tareas.php");
		}
	}
	$conn->close();
?>