<?php
	session_start();
<<<<<<< HEAD
	include_once 'includes/dbh.inc.php';
=======
  include_once 'includes/dbh.inc.php';
>>>>>>> 225ce07d73fde41e844dd38dc4628a694625e29e
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
<<<<<<< HEAD
							$sql = "SELECT * FROM `users` WHERE `userID` = '".$_SESSION['uID']."' ";
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
								</form>';

=======
              $sql = "SELECT * FROM `users` WHERE `userID` = '".$_SESSION['uID']."' ";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_fetch_array($result);
              if ($resultCheck['adminAccess'] == false ){
                 //if user is logged in
                echo '<form action="includes/logout.inc.php" method="POST">
                  <button type="submit" name="submit">Logout</button>
                  </form>';
              }
              elseif($resultCheck['adminAccess'] == true){
                echo '<a href="newAdmin.php">New Admin</a>
                       <a href="newCategory.php">New Category</a>
                       <a href="newQuestion.php">New Question</a>
                       <form action="includes/logout.inc.php" method="POST">
                  <button type="submit" name="submit">Logout</button>
                  </form>';
              }
							
>>>>>>> 225ce07d73fde41e844dd38dc4628a694625e29e
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
					<a href=""></a>
				</div>
			</div>
		</nav>
	<header>