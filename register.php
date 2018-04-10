<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Register</h2>
		<form class="signup-form" action="includes/register.inc.php" method="POST">
			<input type="text" name="first" placeholder="First Name">
			<input type="text" name="last" placeholder="Last Name">
			<input type="text" name="email" placeholder="E-mail">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" name="submit">Register</button>
		</form>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
