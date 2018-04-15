<?php
	session_start();

	include_once 'includes/dbh.inc.php';

  include_once 'includes/dbh.inc.php';

?>
<div class="hero-head">
	<div class="container">
		<?php
			if(isset($_SESSION['uID'])){
				/*$sql = "SELECT * FROM `users` WHERE `userID` = '".$_SESSION['uID']."' ";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_fetch_array($result);
				//if user is logged in

				if($resultCheck['adminAccess'] == 0){
					//this what apppears to the user

				}elseif($resultCheck['adminAccess'] == 1){
					//this is what appears to the admin
					echo '
					<ul class="adminLink">
					<li><a href="newCategory.php">Edit Questions/Categories</a></li>
					<li><a href="newAdmin.php">Grant Admin Privilage</a></li>
					</ul>';
				}
				echo '<form action="includes/logout.inc.php" method="POST">
					<button type="submit" name="submit">Logout</button>
					</form>';*/

				$sql = "SELECT * FROM `users` WHERE `userID` = '".$_SESSION['uID']."' ";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_fetch_array($result);
				if ($resultCheck['adminAccess'] == false ){
					 //if user is logged in
					echo '<div class="level">
									<div class="level-left">
										<div class="level-item">
											<p class="has-text-centered is-size-3">
												<a class="has-text-white" href="index.php"><b>QUIZ</b>Mania</a>
											</p>
										</div>
									</div>
									<div class="level-right">
										<div class="level-item">
											<div class="has-text-centered is-size-5 title">
												<a class="has-text-white" href="userScores.php">Your Scores</a>
										</div>
									</div><br/>
									<div class="level-item">
										<div class="has-text-centered is-size-5 title">
											<a class="has-text-white" href="highScores.php">High Scores</a>
										</div>
									</div><br/>
									<div class="level-item">
										<form action="includes/logout.inc.php" method="POST">
											<button class="button is-warning is-rounded" type="submit" name="submit">Logout</button>
										</form>
									</div>
								</div>
								</div>';
				}
				elseif($resultCheck['adminAccess'] == true){
					echo '<div class="navbar is-transparent">
									<div class="navbar-menu">
										<div class="navbar-start">
											<a class="navabar-item has-text-white is-size-3" href="index.php"><b>QUIZ</b>Mania</a>
										</div>
										<div class="navbar-end">
											<div class="navbar-item has-dropdown is-hoverable">
												<a class="navbar-link has-text-white is-size-5"><b>Edit Options</b></a>
												<div class="navbar-dropdown">
													<a class="navbar-item" href="newAdmin.php">New Admin</a>
													<hr class="navbar-divider">
													<a class="navbar-item" href="newCategory.php">New Category</a>
													<hr class="navbar-divider">
													<a class="navbar-item" href="newQuestion.php">New Question</a>
													<hr class="navbar-divider">
													<a class="navbar-item" href="removeCategory.php">Remove Category</a>
													<hr class="navbar-divider">
													<a class="navbar-item" href="chooseEditCategory.php">Edit Category</a>
												</div>
											</div>
										</div>
										<div class="navbar-item">
											<form action="includes/logout.inc.php" method="POST">
												<button class="button is-warning is-rounded" type="submit" name="submit">Logout</button>
											</form>
										</div>
										</div>
										</div>';
				}
			}
			else{
				//if no user is logged in
				echo '<div class="level">
								<div class="level-left">
									<div class="level-item">
										<p class="has-text-centered is-size-3">
											<a class="has-text-white" href="index.php"><b>QUIZ</b>Mania</a>
										</p>
									</div>
								</div>
								<div class="level-right">
								<form action="includes/login.inc.php" method="POST">
									<div class="field is-grouped">
										<p class="control">
											<input class="input has-text-centered is-rounded" type="text" name="userInput" placeholder="Username/E-mail" required>
										</p>
										<p class="control">
											<input class="input has-text-centered is-rounded" type="password" name="passInput" placeholder="Password" required>
										</p>
										<p class="control">
											<button class="button is-primary is-rounded" type="submit" name="submit">Log In</button>
										</p>
										<p class="control">
											<a class="button is-warning is-outlined is-rounded" href="register.php">Register</a>
											</p>
									</div>
								</form>
								</div>
							</div>';
			}
		?>
	</div>
</div>
