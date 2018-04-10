<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<?php
		if (isset($_SESSION['u_id'])) {
			if ($_SESSION['u_username'] != 'Admin') {
				include_once 'includes/dbh.inc.php';
				$sql = 'SELECT * FROM schedules WHERE s_volume > 0;';
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
								<th>Vessel Name</th>
								<th>Origin</th>
								<th>Destination</th>
								<th>Department</th>
								<th>Arrival</th>
								<th>Volume</th>
								<th>Book</th>
							</tr>';
										
					while($row = mysqli_fetch_assoc($result)) {
						/*echo '
						<form action="includes/bookvessel.inc.php" method="POST">
							<tr>
								<th><input type="text" name="s_id" value="'.$row['s_id'].'" readonly></th>
								<th><input type="text" name="s_vessel" value="'.$row['s_vessel'].'" readonly></th>
								<th><input type="text" name="s_origin" value="'.$row['s_origin'].'" readonly></th>
								<th><input type="text" name="s_destination" value="'.$row['s_destination'].'" readonly></th>
								<th><input type="text" name="s_departure" value="'.$row['s_departure'].'" readonly></th>
								<th><input type="text" name="s_arrival" value="'.$row['s_arrival'].'" readonly></th>
								<th><input type="text" name="s_volume" value="'.$row['s_volume'].'" readonly></th>
								<th><button type="submit" name="book">Book</button></th>
							</tr>
						</form>';*/
						
						echo '
							<form action="includes/bookvessel.inc.php" method="POST">
								<tr>
									<th>'.$row['s_id'].'<input type="hidden" name="s_id" value="'.$row['s_id'].'"></th>
									<th>'.$row['s_vessel'].'</th>
									<th>'.$row['s_origin'].'</th>
									<th>'.$row['s_destination'].'</th>
									<th>'.$row['s_departure'].'</th>
									<th>'.$row['s_arrival'].'</th>
									<th>'.$row['s_volume'].'<input type="hidden" name="s_volume" value="'.$row['s_volume'].'"></th>
									<th><button type="submit" name="book">Book</button></th>
								</tr>
							</form>';
					}
					
					echo 
					'</table>';
				}
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