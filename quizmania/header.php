<?php
	session_start();

	include_once 'includes/dbh.inc.php';

  include_once 'includes/dbh.inc.php';

?>

		<div class="hero-head">
				<div class="container">
					<nav class="level">
						<div class="level-left">
							<div class="level-item">
								<p class="has-text-centered is-size-3">
									<a class="has-text-white" href="index.php"><b>QUIZ</b>Mania</a>
								</p>
							</div>
						</div>
						<div class="level-right">
							<div class="level-item">
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
											echo '<p class="level-item">
															<p class="has-text-centered is-size-5 title">
																<a class="has-text-white" href="highScores.php">High Scores</a>
															</p>
														</p><br/>
														<p class="level-item">
															<form action="includes/logout.inc.php" method="POST">
																<button class="button is-warning is-rounded" type="submit" name="submit">Logout</button>
															</form>
														</p>';
										}
										elseif($resultCheck['adminAccess'] == true){
											echo '<p class="level-item">
															<p class="has-text-centered is-size-5 title">
																<a class="has-text-white" href="newAdmin.php">New Admin</a>
															</p>
														</p><br/>
														<p class="level-item">
															<p class="has-text-centered is-size-5 title">
																<a class="has-text-white" href="newCategory.php">New Category</a>
															</p>
														</p><br/>
														<p class="level-item">
															<p class="has-text-centered is-size-5 title">
																<a class="has-text-white" href="newQuestion.php">New Question</a>
															</p>
														</p><br/>
														<p class="level-item">
															<p class="has-text-centered is-size-5 title">
																<a class="has-text-white" href="removeCategory.php">Remove Category</a>
															</p>
														</p><br/>
														<p class="level-item">
															<p class="has-text-centered is-size-5 title">
																<a class="has-text-white" href="chooseEditCategory.php">Edit Category</a>
															</p>
														</p>
														</p><br/>
														<p class="level-item">
														<form action="includes/logout.inc.php" method="POST">
															<button class="button is-warning is-rounded" type="submit" name="submit">Logout</button>
														</form>
														<p/>';
										}


									}
									else{
										//if no user is logged in
										echo'<form action="includes/login.inc.php" method="POST">
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
												</form>';
									}
								?>
							</div>
						</div>
					</nav>
				</div>
		</div>
