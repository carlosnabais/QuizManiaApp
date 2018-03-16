<?php
	include_once 'header.php';
?>
	<section class="main-container">
		<div class="main-wrapper">
			<h2>Registration</h2>
			<form class="register-form" action="includes/registration.inc.php" method="POST">
				<label for="fname"><b>Firstname: </b></label>
				<input type="text" name="fname" placeholder="Firstname..." required><br>
				<label for="lname"><b>Lastname: </b></label>
				<input type="text" name="lname" placeholder="Lastname..." required><br>
				<label for="eml"><b>Email: </b></label>
				<input type="text" name="eml" placeholder="E-Mail..." required><br>
				<label for="uname"><b>Username: </b></label>
				<input type="text" name="uname" placeholder="Username..." required><br>
				<label for="psw"><b>Password: </b></label>
				<input type="password" name="psw" placeholder="Password..." required><br>
				<button type="submit" name="submit">Register</button>
			</form>
		</div>
	</section>
	
<?php
	include_once 'footer.php';
?>