<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	<header>
		<div class="main-header">
			<h1>Maersk Container Management System</h1>
		</div>
	</header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">Home</a></li>
				<?php
					if (isset($_SESSION['u_id'])) {
						//echo '<li><a href="shipment.php">Shipment</a></li>';
						
						if ($_SESSION['u_username'] == 'Admin') {
							echo '
								<li><a href="createschedule.php">Create Schedule</a></li>
								<li><a href="editschedule.php">Edit Schedule</a></li>
								<li><a href="register.php">Register Agent</a></li>
							';
						}
						else {
							echo '
								<li><a href="bookvessel.php">Book Vessel</a></li>
							';
						}
					}
				?>
			</ul>
			<div class="nav-login">
				<?php
					if (isset($_SESSION['u_id'])) {
						echo '
							<form action="includes\logout.inc.php" method="POST">
							<button type="submit" name="submit">Log Out</button>
							</form>';		
					} else {
						echo '
							<form action="includes/login.inc.php" method="POST">
							<input type="text" name ="username" placeholder="Username/E-mail">
							<input type="password" name="password" placeholder="Password">
							<button type="submit" name="submit">Log In</button>
							</form>';
					}
				?>				
			</div>
		</div>
	</nav>
</header>