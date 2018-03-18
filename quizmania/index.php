<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

			<?php
				if(isset($_SESSION['uID'])){
					$sql = "SELECT * FROM `users` WHERE `userID` = '".$_SESSION['uID']."' ";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_fetch_array($result);
					//echo 'You are logged in '.$resultCheck['username'];
					echo '<section class="main-container">';
					echo '<div class="main-wrapper">';
					echo '<h2>Welcome '.$resultCheck['username'];
					echo '</h2';
					echo '</div>';
					echo '</section>';
				}else{
					echo '<section class="main-container">';
					echo '<div class="main-wrapper">';
					echo '<h2>Welcome</h2>';
					echo '</div>';
					echo '</section>';
				}
			?>

	
<?php
	include_once 'footer.php';
?>
