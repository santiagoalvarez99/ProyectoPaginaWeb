<?php
	require_once 'conn.php';
 
	if($_GET['task_id']){
		$task_id = $_GET['task_id'];
 
		$conn->query("DELETE FROM `tareas` WHERE `id` = $task_id") or die(mysqli_errno($conn));
		header("location: index.php");
	}	
?>