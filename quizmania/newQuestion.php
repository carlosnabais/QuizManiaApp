<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
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
			<form class="register-form" action="includes/addQuestion.inc.php" method="POST">
				<label for="catTitle"><b>Select Desired Category: </b></label>
         <select name="catTitle">
          <?php foreach($array as $option) : ?>
          <option value="<?php echo $option->categoryID; ?>"><?php echo$option->categoryTitle;?></option>
          <?php endforeach; ?>
        </select><br>
				<label for="qText"><b>Question Text: </b></label>
        <textarea name="qText" rows="5" cols="40" placeholder="Question Text..." required></textarea>
        <p>Input Answers Available to the User and Select the Correct Answer.</p>
				<input type="radio" name="correctAnswer" value="1"><input type="text" name="InputAnsOne" placeholder="Possible Answer..." required><br>
				<input type="radio" name="correctAnswer" value="2"><input type="text" name="InputAnsTwo" placeholder="Possible Answer..." required><br>
				<input type="radio" name="correctAnswer" value="3"><input type="text" name="InputAnsThree" placeholder="Possible Answer..." required><br>
				<input type="radio" name="correctAnswer" value="4"><input type="text" name="InputAnsFour" placeholder="Possible Answer..." required><br>
				<button type="submit" name="submit">Next Question</button>
        <button type="submit" name="submit">Finished</button>
			</form>
		</div>
	</section>
	
<?php
	include_once 'footer.php';
?>