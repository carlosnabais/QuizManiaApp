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
  //Populating user drop down select with username array
  $sql = "SELECT * FROM `categories`";
  $query = mysqli_query($conn, $sql);
  while($array[] = $query-> fetch_object());
  array_pop($array);
?>

	<section class="main-container">
		<div class="main-wrapper">
			<h2>Remove Category</h2>
			<form class="register-form" action="includes/removeCategory.inc.php" method="POST">
				<label for="categorySelect"><b>Select Desired Category to remove: </b></label>
         <select name="categorySelect">
          <?php foreach($array as $option) : ?>
          <option value="<?php echo $option->categoryID; ?>"><?php echo$option->categoryTitle;?></option>
          <?php endforeach; ?>
        </select><br>
        <button type="submit" name="submit">Confirm</button>
			</form>
		</div>
	</section>

	
  
<?php
	include_once 'footer.php';
?>