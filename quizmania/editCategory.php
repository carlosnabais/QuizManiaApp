<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<?php
//test if user is admin to stop standard user from accessing feature
if(isset($_SESSION['uID'])){
					$sql = "SELECT * FROM `users` WHERE `userID` = '".$_SESSION['uID']."' ";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_fetch_array($result);
					//echo 'You are logged in '.$resultCheck['username'];
				if ($resultCheck['adminAccess'] == false ){
          header("Location: index.php");
        }
}
else{
  header("Location: index.php");
}
?>
<?php

  //still to refine so that only details of category selected are shown
  $sql = "SELECT questions.questionID, questionOutput, questionHint, options.optionID, options.option_one, options.option_two, options.option_three, options.option_four 
          FROM `questions`
          Inner JOIN options
          ON questions.questionID=options.questionID;";
  $query = mysqli_query($conn, $sql);
  while($array[] = $query-> fetch_object());
  array_pop($array);
  

  foreach($array as $questionOptionFull) :
  
    echo '<form class="register-form" action="includes/newQuestion.inc.php" method="POST">';
		echo '	<label for="qText"><b>Question Text: </b></label>';
    echo '    <textarea name="qText" rows="5" cols="40" value="' . $questionOptionFull->questionOutput . '" required></textarea>';
    echo '  <input type="text" name="qHint" value="' . $questionOptionFull->questionHint . '"></br>';
    echo '  <p>Input Answers Available to the User and Select the Correct Answer.</p>';
    
    
    
		echo '	<input type="radio" name="correctAnswer" value="1"><input type="text" name="InputAnsOne" value="' . ->option_one . '" required><br>';
		echo '	<input type="radio" name="correctAnswer" value="2"><input type="text" name="InputAnsTwo" value="' . ->option_two . '" required><br>';
    echo '  <input type="radio" name="correctAnswer" value="3"><input type="text" name="InputAnsThree" value="' . ->option_three . '" required><br>';
		echo '	<input type="radio" name="correctAnswer" value="4"><input type="text" name="InputAnsFour" value="' . ->option_four . '" required><br>';
    echo '  <button type="submit" name="next">Next Question</button>';
    echo '  <button type="submit" name="finish">Finished</button>';
    echo '</form>';
  
  end foreach
?>