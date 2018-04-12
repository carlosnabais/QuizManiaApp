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
if($_GET){
  $cID = $_GET['category'];
}
else{
  $cID = mysqli_real_escape_string($conn, $_POST['categorySelect']);
}


  //still to refine so that only details of category selected are shown
  $sql = "SELECT questions.questionID, questionOutput, questionHint, options.optionID, options.option_one, options.option_two, options.option_three, options.option_four, options.correct_option
          FROM `questions`
          Inner JOIN options
          ON questions.questionID=options.questionID
          WHERE categoryID = '$cID';";
  $query = mysqli_query($conn, $sql);
  while($array[] = $query-> fetch_object());
  array_pop($array);

  echo '<br/><br/><br/>
        <div class="container">
        <p class="title is-size-2 has-text-white has-text-centered">Remove a Category</p>';
  foreach($array as $questionOptionFull) :

    echo '<form class="control has-text-centered" action="includes/updateCategory.inc.php" method="POST">';
    echo '<div class="box at-center limit-width">';
    echo '<input type="hidden" name="questionID" value="'. $questionOptionFull->questionID .'">';
    echo '<input type="hidden" name="categoryID" value="'. $cID .'">';
		echo '<label class="label has-text-left" for="qText"><b>Question Text: </b></label>';
    echo '<textarea class="textarea" name="qText" rows="5" cols="40" required>' . $questionOptionFull->questionOutput . '</textarea> </br>';
    echo '<label class="label has-text-left" for="qHint"><b>Question Hint: </b></label>';
    echo '<input class="input input-width" type="text" name="qHint" value="' . $questionOptionFull->questionHint . '"></br>';
    echo '</br><p>Input Answers Available to the User and Select the Correct Answer.</p></br>';
    echo '<input type="radio" name="correctAnswer" value="1" '  . (($questionOptionFull->correct_option == $questionOptionFull->option_one)?'checked' : "") . '><input class="input input-width" type="text" name="InputAnsOne" value="' . $questionOptionFull->option_one . '" required></br>';
		echo '<input type="radio" name="correctAnswer" value="2" '  . (($questionOptionFull->correct_option == $questionOptionFull->option_two)?'checked' : "") . '><input class="input input-width" type="text" name="InputAnsTwo" value="' . $questionOptionFull->option_two . '" required></br>';
    echo '<input type="radio" name="correctAnswer" value="3" '  . (($questionOptionFull->correct_option == $questionOptionFull->option_three)?'checked' : "") . '><input class="input input-width" type="text" name="InputAnsThree" value="' . $questionOptionFull->option_three . '" required></br>';
		echo '<input type="radio" name="correctAnswer" value="4" '  . (($questionOptionFull->correct_option == $questionOptionFull->option_four)?'checked' : "") . '><input class="input input-width" type="text" name="InputAnsFour" value="' . $questionOptionFull->option_four . '" required></br>';
    echo '<br/><div class="field is-grouped is-grouped-centered"><p class="control">';
    echo '<button class="button is-rounded is-primary" type="submit" name="update">Update</button></p>';
    echo '<p class"control"><button class="button is-rounded is-danger" type="submit" name="remove">Remove</button></p></div>';
    echo '</div>';
    echo '</form><br/>';
   endforeach;
   echo '</div>';
?>
<?php
	include_once 'footer.php';
?>

</section>
</body>
