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
	include_once 'includes/dbh.inc.php';
 	include_once 'includes/refineCategoryOutput.inc.php';
?>
			<?php
				if(isset($_SESSION['uID'])){
					//this is what is diplayed to the signed in users
					echo '<div class="hero-body">';

          $sql = "SELECT * FROM `users` WHERE `userID` = '".$_SESSION['uID']."' ";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_fetch_array($result);
          if ($resultCheck['adminAccess'] == false ){
            //welcome message for normal user
            echo '<div class="container has-text-centered">
										<p class="has-text-white is-size-3 title is-spaced">Welcome, <b>'.$resultCheck['firstName']."!";
          }
          else if($resultCheck['adminAccess'] == true){
            //welcome message for admin to inform them they are at admin level
            echo '<div class="container has-text-centered">
										<p class="has-text-white is-size-3 title is-spaced">Welcome, <b>'.$resultCheck['firstName']."!";
          }

					echo '</b></p><p class="subtitle has-text-white">Put your knowledge to the test by answering the following quizzes.</p>';
					echo '</br>';
					echo '<div class="container">';

          foreach($array as $catFull) :

					echo 		'<div class="box limit-width at-center"><ul>';
					echo    '<li><b>Category: </b>'. $catFull->categoryTitle .'</li>';
					echo    '<li><b>Recommeneded level of ability: </b>'. $catFull->categoryLevel .'</li>';
					echo    '<li><b>Last Updated: </b>'. $catFull->dateUpdated .'</li>';
					echo    '<li><b>Number Of questions: </b>10</li>';
					echo    '<li><b>Time to complete: </b>10 Minutes</li>';
					echo    '</br>';
					echo 	'<form action="questions.php" method="POST">';
					echo    '<input type="hidden" type="submit" name="category_id" value="'.$catFull->categoryID.'"/>';
					echo    '<button class="button is-danger is-rounded" type="submit" name="question_refine" class="startquiz">Start Quiz</button>';
					echo 	'</form>';
					echo  	'</ul></div>';

          endforeach;

					echo '</div></div></div>';


				}
        else{
					echo '<div class="hero-body"><div class="container has-text-left">';
					echo '<p class="has-text-white is-size-1 title is-spaced">Welcome to <b>QUIZ</b>Mania</p>';
					echo '</div></div>';
				}

			?>
<?php
	include_once 'footer.php';
?>
</section>
</body>
