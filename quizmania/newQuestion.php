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
  //Populating category drop down select with  category title array
  $sql = "SELECT * FROM `Categories`";
  $query = mysqli_query($conn, $sql);
  while($array[] = $query-> fetch_object());
  array_pop($array);
?>
	<section class="main-container">
		<div class="main-wrapper">
			<h2>New Question</h2>
			<form class="register-form" action="includes/newQuestion.inc.php" method="POST">
				<label for="chosenID"><b>Select Desired Category: </b></label>
         <select name="chosenID">
          <?php foreach($array as $option) : ?>
          <option value="<?php echo $option->categoryID; ?>"><?php echo$option->categoryTitle;?></option>
          <?php endforeach; ?>
        </select><br>
				<label for="qText"><b>Question Text: </b></label>
        <textarea name="qText" rows="5" cols="40" placeholder="Question Text..." required></textarea>
        <input type="text" name="qHint" placeholder="Question Hint..."></br>
        <p>Input Answers Available to the User and Select the Correct Answer.</p>
				<input type="radio" name="correctAnswer" value="1"><input type="text" name="InputAnsOne" placeholder="Possible Answer..." required><br>
				<input type="radio" name="correctAnswer" value="2"><input type="text" name="InputAnsTwo" placeholder="Possible Answer..." required><br>
				<input type="radio" name="correctAnswer" value="3"><input type="text" name="InputAnsThree" placeholder="Possible Answer..." required><br>
				<input type="radio" name="correctAnswer" value="4"><input type="text" name="InputAnsFour" placeholder="Possible Answer..." required><br>
				<button type="submit" name="next">Next Question</button>
        <button type="submit" name="finish">Finished</button>
			</form>
		</div>
	</section>
	
<?php
	include_once 'footer.php';
?>