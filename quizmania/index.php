<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
  include_once 'includes/refineCategoryOutput.inc.php'
?>

			<?php
				if(isset($_SESSION['uID'])){
					//this is what is diplayed to the signed in users
					echo '<section class="main-container">';
					echo '<div class="main-wrapper">';
          
          $sql = "SELECT * FROM `users` WHERE `userID` = '".$_SESSION['uID']."' ";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_fetch_array($result);
          if ($resultCheck['adminAccess'] == false ){
            //welcome message for normal user
            echo '<h2>Welcome '.$resultCheck['firstName']."!";
          }
          else if($resultCheck['adminAccess'] == true){
            //welcome message for admin to inform them they are at admin level
            echo '<h2>Welcome Admin, '.$resultCheck['firstName']."!";
          }
					echo '</h2>';
					echo '</br>';
					echo '<h3>Put your knowledge to test by taking the following multiple choice questions</h3>';	
					echo '</br>';
           
          foreach($array as $catFull) : 

          echo '<div class="unorderlist">';				
					echo  '<ul>';
					echo    '<li><Strong>Category: </strong>'. $catFull->categoryTitle .'</li>';
					echo    '<li><Strong>Recommeneded level of ability: </strong>'. $catFull->categoryLevel .'</li>';
					echo    '<li><Strong>Last Updated: </strong>'. $catFull->dateUpdated .'</li>';
					echo    '<li><Strong>Number Of questions: </strong>10</li>';
					echo    '<li><Strong>Time to complete: </strong>10 Minutes</li>';
					echo    '</br>';
					echo    '<a href="questions.php?n=1" class="startquiz">Start Quiz</a>';
					echo  '</ul>';
					echo '</div>';
   
          endforeach; 
          
					echo '</div>';
					echo '</section>';
          
				
				}
        else{
          
					echo '<section class="main-container">';
					echo  '<div class="main-wrapper">';
					echo    '<h2>Welcome</h2>';
					echo  '</div>';
					echo '</section>'; 
				}
			?> 

	
<?php
	include_once 'footer.php';
?>
