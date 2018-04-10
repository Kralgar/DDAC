<?php

if (!isset($_POST['submit'])) {
	header('Location: ..\register.php');
}
else {
	include_once 'dbh.inc.php';
	
	$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//error handlers
	//check for empty fields
	if (empty($first) || empty($last) || empty ($email) || empty ($username) || empty ($password)) {
		header('Location: ..\register.php?register=empty');
	}
	else {
		//check if input characters are valid
		if (!preg_match('/^[a-zA-Z]*$/', $first) || !preg_match('/^[a-zA-Z]*$/', $last)) {
			header('Location: ..\register.php?register=invalid');
		}
		else {
			//check if e-mail is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header('Location: ..\register.php?register=email');
			}
			else {
				/*
				$sql = 'SELECT * FROM users WHERE u_username="'.$username.'";';
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck > 0) {
					header('Location: ..\register.php?register=usertaken');
				}
				else {
					//hashing the password
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT); 
					//insert the user into the database
					$sql = 'INSERT INTO users (u_first_name, u_last_name, u_email, u_username, u_password) 
						VALUES (?, ?, ?, ?, ?);';
					$stmt = mysqli_stmt_init($conn);	
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						header('Location: ..\register.php?register=sqlerror');
					}
					else {
						mysqli_stmt_bind_param($stmt, 'sssss', $first, $last, $email, $username, $hashedPwd);
						mysqli_stmt_execute($stmt);
						header('Location: ..\register.php?register=success');
					}
				}*/
				
				$sql = 'SELECT * FROM users WHERE u_username=?;';
				$stmt = mysqli_stmt_init($conn);
				
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header('Location: ..\register.php?register=sqlerror');
				}
				else {
					mysqli_stmt_bind_param($stmt, 's', $username);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					$resultCheck = mysqli_num_rows($result);
					
					if ($resultCheck > 0) {
						header('Location: ..\register.php?register=usertaken');
					}
					else {
						//hashing the password
						$hashedPwd = password_hash($password, PASSWORD_DEFAULT); 
						//insert the user into the database
						$sql = 'INSERT INTO users (u_first_name, u_last_name, u_email, u_username, u_password) 
							VALUES (?, ?, ?, ?, ?);';
						$stmt = mysqli_stmt_init($conn);	
						if (!mysqli_stmt_prepare($stmt, $sql)) {
							header('Location: ..\register.php?register=sqlerror');
						}
						else {
							mysqli_stmt_bind_param($stmt, 'sssss', $first, $last, $email, $username, $hashedPwd);
							mysqli_stmt_execute($stmt);
							header('Location: ..\register.php?register=success');
						}
					}
				}
			}
		}
	}
}