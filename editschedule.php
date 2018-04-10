<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<?php
		if (isset($_SESSION['u_id'])) {
			if ($_SESSION['u_username'] == 'Admin') {
				include_once 'includes/dbh.inc.php';
				$sql = 'SELECT * FROM schedules;';
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				if (!$resultCheck) {
					echo '<p>No schedules to display</p>';
				}
				else {
					echo '
						<table>
							<tr>
								<th>Id</th>
								<th>Vessel</th>
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
							<form action="includes/modifyschedule.inc.php" method="POST">
								<tr>
									<th><input type="text" name="s_id" value="'.$row['s_id'].'" readonly></th>
									<th><input type="text" name="s_vessel" value="'.$row['s_vessel'].'"></th>
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