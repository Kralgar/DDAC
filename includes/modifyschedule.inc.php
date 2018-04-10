<?php

if (isset($_POST['delete'])) {
	include_once 'dbh.inc.php';
	$id = $_POST['s_id'];
	
	$sql1 = 'DELETE FROM bookings WHERE s_id = ?;';
	$stmt1 = mysqli_stmt_init($conn);
	$sql2 = 'DELETE FROM schedules WHERE s_id = ?;';
	$stmt2 = mysqli_stmt_init($conn);
	
	if (!mysqli_stmt_prepare($stmt1, $sql1) || !mysqli_stmt_prepare($stmt2, $sql2)) {
		header('Location: ..\editschedule.php?deleteschedule=sqlerror');
	}
	else {
		mysqli_stmt_bind_param($stmt1, 's', $id);
		mysqli_stmt_bind_param($stmt2, 's', $id);
		mysqli_stmt_execute($stmt1);
		mysqli_stmt_execute($stmt2);
		
		header('Location: ..\editschedule.php?deleteschedule=success');
	}
}
else if (isset($_POST['edit'])){
	include_once('dbh.inc.php');
	$id = $_POST['s_id'];
	$vessel = $_POST['s_vessel'];
	$origin = $_POST['s_origin'];
	$destination = $_POST['s_destination'];
	$departure = $_POST['s_departure'];
	$arrival = $_POST['s_arrival'];
	$volume = $_POST['s_volume'];
	
	$sql = 'UPDATE schedules
		SET s_origin = ?, s_vessel = ?, s_destination = ?, s_departure = ?, s_arrival = ?, s_volume = ?
		WHERE s_id = ?;';
	$stmt = mysqli_stmt_init($conn);
	
	//error handlers
	//check for empty fields
	if (empty($vessel) || empty($origin) || empty($destination) || empty($departure) || empty($arrival) || empty($volume)) {
		header('Location: ..\editschedule.php?editschedule=empty');
	}
	else {
		
		//check if input is valid
		if (!strtotime($departure) || !strtotime($arrival) || !is_numeric($volume) || $volume < 0) {
			header('Location: ..\editschedule.php?editschedule=invalid');
		}
		else {	
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header('Location: ..\editschedule.php?editschedule=sqlerror');
			}
			else {
				$departure_date = strtotime($departure);
				$arrival_date = strtotime($arrival);
				$departure_date = date('Y-m-d', $departure_date);
				$arrival_date = date('Y-m-d', $arrival_date);
				
				mysqli_stmt_bind_param($stmt, 'sssssss', $origin, $vessel, $destination, $departure_date, $arrival_date, $volume, $id);
				mysqli_stmt_execute($stmt);

				header('Location: ..\editschedule.php?editschedule=success');
			}
		}
	}
}
else {
	header('Location: ..\editschedule.php');
}
