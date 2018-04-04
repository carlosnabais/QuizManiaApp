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
<section class="hero-body">
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
  //Populating category drop down select with  category title array
  $sql = "SELECT * FROM `Categories`";
  $query = mysqli_query($conn, $sql);
  while($array[] = $query-> fetch_object());
  array_pop($array);
?>
<div class="hero-body">
	<div class="container">
		<p class="title has-text-centered has-text-white is-size-2">Add a New Question</p>
		<form class="control has-text-centered" action="includes/newQuestion.inc.php" method="POST">
			<div class="box at-center limit-width">
				<div class="field at-center input-width">
					<label class="label has-text-left" for="chosenID">Select Desired Category:</label>
					<div class="control">
						<div class="select">
							<select name="chosenID">
				        <?php foreach($array as $option) : ?>
				          <option value="<?php echo $option->categoryID; ?>"><?php echo$option->categoryTitle;?></option>
				        <?php endforeach; ?>
				      </select>
						</div>
					</div>
				</div>
				<div class="field at-center input-width">
					<label class="label has-text-left" for="qText">Question Text:</label>
					<div class="control">
						<textarea class="textarea" name="qText" rows="5" cols="40" placeholder="Question Text" required></textarea><br/>
						<input class="input" type="text" name="qHint" placeholder="Question Hint">
					</div>
				</div>
				<label class="label is-size-6 input-width at-center has-text-left">Input Answers Available to the User and Select the Correct Answer</label><br/>
				<div class="field is-grouped at-center input-width">
					<div class="control">
						<input type="radio" name="correctAnswer" value="1">
					</div>
					<div class="control">
						<input class="input" type="text" name="InputAnsOne" placeholder="Option one" required>
					</div>
				</div>
				<div class="field is-grouped at-center input-width">
					<div class="control">
						<input type="radio" name="correctAnswer" value="2">
					</div>
					<div class="control">
						<input class="input" type="text" name="InputAnsTwo" placeholder="Option two" required>
					</div>
				</div>
				<div class="field is-grouped at-center input-width">
					<div class="control">
						<input type="radio" name="correctAnswer" value="3">
					</div>
					<div class="control">
						<input class="input" type="text" name="InputAnsThree" placeholder="Option three" required>
					</div>
				</div>
				<div class="field is-grouped at-center input-width">
					<div class="control">
						<input type="radio" name="correctAnswer" value="4">
					</div>
					<div class="control">
						<input class="input" type="text" name="InputAnsFour" placeholder="Option four" required>
					</div>
				</div>
				<div class="field is-grouped at-center input-width">
					<div class="control">
			    	<button class="button is-primary is-rounded" type="submit" name="next">Next Question</button>
			  	</div>
					<div class="control">
			    	<button class="button is-danger is-rounded" type="submit" name="finish">Finished</button>
			  	</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
	include_once 'footer.php';
?>
</section>
