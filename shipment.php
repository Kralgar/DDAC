<?php
	//include_once 'header.php';
?>


<section class="main-container">
	<div class="main-wrapper">
		<?php
		/*
		if (isset($_SESSION['u_id'])) {
			if ($_SESSION['u_username'] == 'Admin') {
				include_once 'includes/dbh.inc.php';
				$sql = 'SELECT * FROM shipments;';
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				if (!$resultCheck) {
					echo '<p>No shipments to display</p>';
				}
				else {
					echo '
					<table>
						<tr>
							<th>Id</th>
							<th>Origin</th>
							<th>Destination</th>
							<th>Department</th>
							<th>Arrival</th>
							<th>Volume</th>
							<th>Edit</th>
							<th>Delete</t>
						</tr>';
										
					while($row = mysqli_fetch_assoc($result)) {
						echo '
						<form action="includes/modifyshipment.inc.php" method="POST">
							<tr>
								<th><input type="text" name="s_id" value="'.$row['s_id'].'" readonly></th>
								<th><input type="text" name="s_origin" value="'.$row['s_origin'].'"></th>
								<th><input type="text" name="s_destination" value="'.$row['s_destination'].'"></th>
								<th><input type="text" name="s_departure" value="'.$row['s_departure'].'"></th>
								<th><input type="text" name="s_arrival" value="'.$row['s_arrival'].'"></th>
								<th><input type="text" name="s_volume" value="'.$row['s_volume'].'"></th>
								<th><button type="submit" name="edit">Edit</button></th>
								<th><button type="submit" name="delete">Delete</button></th>
							</tr>
						</form>';
					}
					
					echo 
					'</table>';
				}
			}
			else {
				echo '
				<h2>Book Shipment</h2>
				<form class="shipment-form" action="includes/bookshipment.inc.php" method="POST">
					<input type="text" name="origin" placeholder="Origin Address">
					<input type="text" name="destination" placeholder="Destination Address">
					<input type="text" name="departure" placeholder="Departure Date">
					<input type="text" name="arrival" placeholder="Arrival Date">
					<input type="text" name="volume" placeholder="Volume">
					<button type="submit" name="submit">Book Shipment</button>
				</form>';
			}	
		}
		else {
			echo '<p>You must be logged in to view this page.</p>';
		}
		*/
		?>
	</div>
</section>

<?php
	//include_once 'footer.php';
?>