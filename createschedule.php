<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<?php	
		if (isset($_SESSION['u_id'])) {	
			if ($_SESSION['u_username'] == 'Admin') {
				echo '
				<h2>Create Schedule</h2>
				<form class="shipment-form" action="includes/createschedule.inc.php" method="POST">
					<input type="text" name="vessel" placeholder="Vessel Name">
					<input type="text" name="origin" placeholder="Origin Address">
					<input type="text" name="destination" placeholder="Destination Address">
					<input type="text" name="departure" placeholder="Departure Date">
					<input type="text" name="arrival" placeholder="Arrival Date">
					<input type="text" name="volume" placeholder="Volume">
					<button type="submit" name="submit">Create Schedule</button>
				</form>';
			}
			else {
				header('Location: index.php');
			}	
		}
		else {
			header('Location: index.php');
		}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>