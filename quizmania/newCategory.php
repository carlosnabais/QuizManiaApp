<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>
<section class="main-container">
		<div class="main-wrapper">
			<h2>New Category</h2>
			<form class="register-form" action="includes/createCategory.inc.php" method="POST">
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