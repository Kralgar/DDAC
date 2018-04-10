<?php

if (!isset($_POST['submit'])) {
	header('Location: ..\createschedule.php');
}
else {
	include_once 'dbh.inc.php';
	
	$vessel = $_POST['vessel'];
	$origin = $_POST['origin'];
	$destination = $_POST['destination'];
	$departure = $_POST['departure'];
	$arrival = $_POST['arrival'];
	$volume = $_POST['volume'];
	
	//error handlers
	//check for empty fields	
	if (empty($vessel) || empty($origin) || empty($destination) || empty($departure) || empty($arrival) || empty($volume)) {
		header('Location: ..\createschedule.php?createschedule=empty');
	}
	else {
		//check if input is valid
		if (!strtotime($departure) || !strtotime($arrival) || !is_numeric($volume) || $volume < 0) {
			header('Location: ..\createschedule.php?createschedule=invalid');
		}
		else {
			$sql = 'INSERT INTO schedules (s_vessel, s_origin, s_destination, s_departure, s_arrival, s_volume)
				VALUES(?, ?, ?, ?, ?, ?);';
			$stmt = mysqli_stmt_init($conn);
			
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header('Location: ..\createschedule.php?createschedule=sqlerror');
			}
			else {
				$departure_date = strtotime($departure);
				$arrival_date = strtotime($arrival);
				$departure_date = date('Y-m-d', $departure_date);
				$arrival_date = date('Y-m-d', $arrival_date);
				
				mysqli_stmt_bind_param($stmt, 'ssssss', $vessel, $origin, $destination, $departure_date, $arrival_date, $volume);
				mysqli_stmt_execute($stmt);
				
				header('Location: ..\createschedule.php?createschedule=success');
			}
		}
	}
}