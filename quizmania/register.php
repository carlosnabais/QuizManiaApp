<!DOCTYPE html>
<html>
<head>
	<title>QuizMania</title>
	<link rel="stylesheet" type="text/css" href="newStyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>
<section class="hero is-fullheight gradient-background">

<?php
	include_once 'header.php';
?>
<div class="hero-body">
	<div class="container">
		<p class="title has-text-white has-text-centered is-size-2">Registration</p>
		<form class="control has-text-centered" action="includes/registration.inc.php" method="POST">
			<div class="box at-center limit-width">
				<div class="field at-center input-width">
					<label class="label has-text-left" for="fname">Firstname:</label>
					<div class="control">
						<input class="input" type="text" name="fname" placeholder="Firstname" required>
					</div>
				</div>
				<div class="field at-center input-width">
					<label class="label has-text-left" for="lname">Lastname:</label>
					<div class="control">
						<input class="input" type="text" name="lname" placeholder="Lastname" required>
					</div>
				</div>
				<div class="field at-center input-width">
						<label class="label has-text-left" for="eml">Email:</label>
						<div class="control">
							<input class="input" type="text" name="eml" placeholder="E-Mail" required>
						</div>
				</div>
				<div class="field at-center input-width">
					<label class="label has-text-left" for="uname">Username:</label>
					<div class="control">
						<input class="input" type="text" name="uname" placeholder="Username" required>
					</div>
				</div>
				<div class="field at-center input-width">
					<label class="label has-text-left" for="psw">Password:</label>
					<div class="control">
						<input class="input" type="password" name="psw" placeholder="Password" required>
					</div>
				</div><br/>
				<div class="field input-width at-center">
					<div class="control has-text-centered">
						<button class="button is-primary is-rounded" type="submit" name="submit">Register</button>
					</div>
				</div>
				</div>
			</div>
		</form>
	</div>

</div>

<?php
	include_once 'footer.php';
?>
</section>
