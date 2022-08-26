<?php
	require_once 'conn.php';
 
	if($_GET['task_id'] != ""){
		$task_id = $_GET['task_id'];
 
		$conn->query("UPDATE `tareas` SET `estado` = 1 WHERE `id` = $task_id") or die(mysqli_errno($conn));
		header('location: tareas.php');
	}
?>