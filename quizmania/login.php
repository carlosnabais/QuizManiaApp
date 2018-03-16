<?php
	include_once 'header.php';
?>
	<section class="main-container">
		<div class="main-wrapper">
			<h2>Login</h2>
			<form class="register-form"action="includes/login.inc.php" method="POST">
              <label for="userInput"><b>Username/E-mail: </b></label>
								<input type="text" name="userInput" placeholder="Username/E-mail..." required><br>
              <label for="passInput"><b>Password: </b></label>
								<input type="password" name="passInput" placeholder="Password..." required><br>
								<button type="submit" name="submit">Log In</button>
			</form>
		</div>
	</section>
	
<?php
	include_once 'footer.php';
?>