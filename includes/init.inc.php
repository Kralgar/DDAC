<?php

include_once 'dbh.inc.php';

$sql = 'SELECT * FROM users WHERE u_username = "Admin"';
$result = mysqli_query($conn, $sql);

if (!mysqli_num_rows($result)) {
	
	$password = '123';
	$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
	$sql2 = "INSERT INTO users (u_first_name, u_last_name, u_email, u_username, u_password) 
		VALUES ('Admin', 'Admin', 'admin@maersk.com', 'Admin', ?);";
	$stmt = mysqli_stmt_init($conn);
	
	if (!mysqli_stmt_prepare($stmt, $sql2)) {
		
	}
	else {
		mysqli_stmt_bind_param($stmt, 's', $hashedPwd);
		mysqli_stmt_execute($stmt);
	}
}

