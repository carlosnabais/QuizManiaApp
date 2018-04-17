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
  //Populating user drop down select with category details array
  $sql = "SELECT * FROM `categories`";
  $query = mysqli_query($conn, $sql);
  while($array[] = $query-> fetch_object());
  array_pop($array);
?>

<div class="hero-body">
	<div class="container">
		<p class="title is-size-2 has-text-white has-text-centered">Choose a Category to Edit</p>
		<form class="control has-text-centered" action="editCategory.php" method="POST">
			<div class="box at-center limit-width">
				<div class="field at-center input-width">
					<label class="label has-text-left" for="categorySelect">Select a category to edit:</label>
					<div class="control">
						<div class="select">
							<select name="categorySelect">
	 							<?php foreach($array as $option) : ?>
	 								<option value="<?php echo $option->categoryID; ?>"><?php echo $option->categoryTitle;?></option>
	 							<?php endforeach; ?>
	 						</select>
						</div>
					</div>
				</div><br/>
				<div class="field input-width at-center">
					<div class="control has-text-centered">
						<button class="button is-primary is-rounded" type="submit" name="submit">Confirm</button>
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
