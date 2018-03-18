<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>QuizMania
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">  
</head>
<body>
	<header>
		<nav>
			<div class="main-wrapper">
				<ul>
					<li><a href="index.php">QuizMania</a></li>
				</ul>
				<div class="nav-login">
					<?php
						if(isset($_SESSION['uID'])){
							//if user is logged in
							echo '<form action="includes/logout.inc.php" method="POST">
								<button type="submit" name="submit">Logout</button>
								</form>';
						}
						else{
							//if no user is logged in
							echo'<form action="includes/login.inc.php" method="POST">
								<input type="text" name="userInput" placeholder="Username/e-mail..." required>
								<input type="password" name="passInput" placeholder="Password..." required>
								<button type="submit" name="submit">Log In</button>
								</form>
								<a href="register.php">Register</a>';
						}
					?>
				</div>
			</div>
		</nav>
	<header>