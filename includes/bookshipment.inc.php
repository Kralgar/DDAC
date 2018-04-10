<?php
/*
session_start();

if (!isset($_POST['submit'])) {
	header('Location: ..\shipment.php');
}
else {
	include_once 'dbh.inc.php';
	
	$origin = $_POST['origin'];
	$destination = $_POST['destination'];
	$departure = $_POST['departure'];
	$arrival = $_POST['arrival'];
	$volume = $_POST['volume'];
	
	//error handlers
	//check for empty fields	
	if (empty($origin) || empty($destination) || empty($departure) || empty($arrival) || empty($volume)) {
		header('Location: ..\shipment.php?shipment=empty');
	}
	else {
		//check if strings are valid dates
		
		if (!strtotime($departure) || !strtotime($arrival) || !is_numeric($volume) || $volume < 0) {
			header('Location: ..\shipment.php?shipment=invalid');
		}
		else {
			$sql = 'INSERT INTO shipments (s_origin, s_destination, s_departure, s_arrival, s_volume, u_id)
				VALUES(?, ?, ?, ?, ?, ?);';
			$stmt = mysqli_stmt_init($conn);
			
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header('Location: ..\shipment.php?shipment=sqlerror');
			}
			else {
				$departure_date = strtotime($departure);
				$arrival_date = strtotime($arrival);
				$departure_date = date('Y-m-d', $departure_date);
				$arrival_date = date('Y-m-d', $arrival_date);
				
				mysqli_stmt_bind_param($stmt, 'ssssss', $origin, $destination, $departure_date, $arrival_date, $volume, $_SESSION['u_id']);
				mysqli_stmt_execute($stmt);
				
				header('Location: ..\shipment.php?shipment=success');
			}
		}
	}
	*/
}