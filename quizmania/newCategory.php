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

<section class="main-container">
		<div class="main-wrapper">
			<h2>New Category</h2>
			<form class="register-form" action="includes/newCategory.inc.php" method="POST">
				<label for="catTitle"><b>Category Title: </b></label>
				<input type="text" name="catTitle" placeholder="Title..." required><br>
				<label for="catLevel"><b>Level of Ability: </b></label>
				<input type="radio" name="abilityLevel" value="High" required> High<br>
				<input type="radio" name="abilityLevel" value="Intermediate" required>Intermediate<br>
				<input type="radio" name="abilityLevel" value="Low" required> Low<br>

				<button type="submit" name="submit">Continue</button>
			</form>
		</div>
	</section>
	
<?php
	include_once 'footer.php';
?>