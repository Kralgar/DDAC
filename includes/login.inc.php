<?php

session_start();

if (!isset($_POST['submit'])) {
	header('Location: ..\index.php');
}
else {
	include_once 'dbh.inc.php';
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//error handlers
	//check if inputs are empty
	if (empty($username) || empty($password)) {
		header('Location: ..\index.php?login=empty');
		exit();
	}
	else {
		$sql = 'SELECT * FROM users WHERE u_username = ?';
		$stmt = mysqli_stmt_init($conn);
		
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header('Location: ..\index.php?login=error');
		}
		else {
			mysqli_stmt_bind_param($stmt, 's', $username);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			
			if (!mysqli_num_rows($result)) {
				header('Location: ..\index.php?login=error');
				session_destroy();
			}
			else {
				if ($row = mysqli_fetch_assoc($result)) {
					$hashedPasswordCheck = password_verify($password, $row['u_password']);
					if	(!$hashedPasswordCheck) {
						header('Location: ..\index.php?login=error');
					}
					elseif ($hashedPasswordCheck) {
						//log in user here
						$_SESSION['u_id'] = $row['u_id'];
						$_SESSION['u_first_name'] = $row['u_first_name'];
						$_SESSION['u_last_name'] = $row['u_last_name'];
						$_SESSION['u_email'] = $row['u_email'];
						$_SESSION['u_username'] = $row['u_username'];
						
						header('Location: ..\index.php?login=success');
					}
				}
			}
		}
	}
}
