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
					//checks if the person logged in is a user or an admin 
					//diplayes different features according to the users/admins
				if ($resultCheck['adminAccess'] == 0 ){
					//this is what is diplayed to the users 
					echo '<section class="main-container">';
					echo '<div class="main-wrapper">';
					echo '<h2>Welcome '.$resultCheck['firstName']."!";
					echo '</h2>';
					echo '</br>';
					echo '<h3>Put your knowledge to test by taking the following multiple choice questions</h3>';	
					echo '</br>';
					echo '<div class="unorderlist">';				
					echo '<ul>';
					echo '<li><Strong>Catagorie: </strong>General knowledge</li>';
					echo '<li><Strong>Number Of questions: </strong>10</li>';
					echo '<li><Strong>Estimated time for completion: </strong>10 Minutes</li>';
					echo '</br>';
					echo '<a href="questions.php?n=1" class="startquiz">Start Quiz</a>';
					echo '</ul>';
					echo '</div>';
					echo '</div>';
					echo '</section>';
				}elseif($resultCheck['adminAccess'] == 1){
					// this is what is displayed to the admin
					echo '<section class="main-container">';
					echo '<div class="main-wrapper">';
					echo '<h2>Welcome Admin ';
					echo $resultCheck['firstName']."!";
					echo '</h2>';
					echo '</br>';
					echo '<h2>Put your knowledge to test by taking the following multiple choice questions</h2>';	
					echo '</br>';
					echo '<div class="unorderlist">';				
					echo '<ul>';
					echo '<li><Strong>Catagorie: </strong>General knowledge</li>';
					echo '<li><Strong>Number Of questions: </strong>10</li>';
					echo '<li><Strong>Estimated time for completion: </strong>10 Minutes</li>';
					echo '</br>';
					echo '<a href="questions.php?n=1" class="startquiz">Start Quiz</a>';
					echo '</ul>';
					echo '</div>';
					echo '</div>';
					echo '</section>';
				}
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
