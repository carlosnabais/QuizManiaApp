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

$cID = mysqli_real_escape_string($conn, $_POST['categorySelect']);

  //still to refine so that only details of category selected are shown
  $sql = "SELECT questions.questionID, questionOutput, questionHint, options.optionID, options.option_one, options.option_two, options.option_three, options.option_four, options.correct_option 
          FROM `questions`
          Inner JOIN options
          ON questions.questionID=options.questionID
          WHERE categoryID = '$cID';";
  $query = mysqli_query($conn, $sql);
  while($array[] = $query-> fetch_object());
  array_pop($array);
  

  foreach($array as $questionOptionFull) :
  
    echo '<form class="register-form" action="includes/updateCategory.inc.php" method="POST">';
    echo '<input type="hidden" name="questionID" value="'. $questionOptionFull->questionID .'">';
    echo '<input type="hidden" name="categoryID" value="'. $cID .'">';
		echo '	<label for="qText"><b>Question Text: </b></label>';
    echo '    <textarea name="qText" rows="5" cols="40" required>' . $questionOptionFull->questionOutput . '</textarea> <br>';
    echo '	<label for="qHint"><b>Question Hint: </b></label>';
    echo '  <input type="text" name="qHint" value="' . $questionOptionFull->questionHint . '"></br>';
    echo '  <p>Input Answers Available to the User and Select the Correct Answer.</p>';
    
    echo '	<input type="radio" name="correctAnswer" value="1" '  . (($questionOptionFull->correct_option == $questionOptionFull->option_one)?'checked' : "") . '><input type="text" name="InputAnsOne" value="' . $questionOptionFull->option_one . '" required><br>';
		echo '	<input type="radio" name="correctAnswer" value="2" '  . (($questionOptionFull->correct_option == $questionOptionFull->option_two)?'checked' : "") . '><input type="text" name="InputAnsTwo" value="' . $questionOptionFull->option_two . '" required><br>';
    echo '  <input type="radio" name="correctAnswer" value="3" '  . (($questionOptionFull->correct_option == $questionOptionFull->option_three)?'checked' : "") . '><input type="text" name="InputAnsThree" value="' . $questionOptionFull->option_three . '" required><br>';
		echo '	<input type="radio" name="correctAnswer" value="4" '  . (($questionOptionFull->correct_option == $questionOptionFull->option_four)?'checked' : "") . '><input type="text" name="InputAnsFour" value="' . $questionOptionFull->option_four . '" required><br>';
   
    echo '  <button type="submit" name="update">Update</button>';
    echo '  <button type="submit" name="remove">Remove</button>';
    echo '</form>';
   endforeach;
 
?>
<?php
	include_once 'footer.php';
?>

</section>
</body>