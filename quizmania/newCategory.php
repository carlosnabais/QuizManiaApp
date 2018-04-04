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
<div class="hero-body">
	<div class="container">
		<p class="title has-text-white is-size-2 has-text-centered">Add a New Category</p>
		<form class="control has-text-centered" action="includes/newCategory.inc.php" method="POST">
			<div class="box at-center limit-width">
				<div class="field input-width at-center">
					<label class="label has-text-left" for="catTitle">Category Title</label>
					<div class="control">
						<input class="input" type="text" name="catTitle" placeholder="Category Title" required>
					</div>
				</div>
				<div class="field input-width at-center">
					<label for="catLevel" class="label has-text-left">Level of Ability</label>
					<div class="control has-text-left">
    				<label class="radio">
      				<input type="radio" name="abilityLevel" value="High" required> High
    				</label>
    				<label class="radio">
							<input type="radio" name="abilityLevel" value="Intermediate" required> Intermediate
    				</label>
						<label class="radio">
							<input type="radio" name="abilityLevel" value="Low" required> Low
    				</label>
  				</div>
				</div><br/>
				<div class="field">
					<div class="control has-text-centered">
						<button class="button is-primary is-rounded" type="submit" name="submit">Continue</button>
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
