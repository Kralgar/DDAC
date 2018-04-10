<?php

if (!isset($_POST['book'])) {
	header('Location: ..\bookvessel.php');
}
else {
	session_start();
	include_once 'dbh.inc.php';
	
	$shipmentId = $_POST['s_id'];
	$volume = $_POST['s_volume'];
	$newVolume = $volume - 1;
	$userId = $_SESSION['u_id'];
	
	$sql1 = 'INSERT INTO bookings (s_id, u_id) VALUES(?,?);';
	$sql2 = 'UPDATE schedules SET s_volume = ? WHERE s_id = ?';
	$stmt1 = mysqli_stmt_init($conn);
	$stmt2 = mysqli_stmt_init($conn);
	
	if (!mysqli_stmt_prepare($stmt1, $sql1) || !mysqli_stmt_prepare($stmt2, $sql2)) {
		header('Location: ..\bookvessel.php?bookvessel=sqlerror');
	}
	else {
		mysqli_stmt_bind_param($stmt1, 'ss', $shipmentId, $userId);
		mysqli_stmt_bind_param($stmt2, 'ss', $newVolume, $shipmentId);
		mysqli_stmt_execute($stmt1);
		mysqli_stmt_execute($stmt2);
		
		header('Location: ..\bookvessel.php?bookvessel=success');
	}
}