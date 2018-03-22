<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>
<?php
  //Populating user drop down select with username array
  $sql = "SELECT * FROM `Users` WHERE `adminAccess` = 0";
  $query = mysqli_query($conn, $sql);
  while($array[] = $query-> fetch_object());
  array_pop($array);
?>
	<section class="main-container">
		<div class="main-wrapper">
			<h2>Create Admin</h2>
			<form class="register-form" action="includes/newAdmin.inc.php" method="POST">
				<label for="usernameSelect"><b>Select Desired User to Grant Admin Access: </b></label>
         <select name="usernameSelect">
          <?php foreach($array as $option) : ?>
          <option value="<?php echo $option->userID; ?>"><?php echo$option->username;?></option>
          <?php endforeach; ?>
        </select><br>
        <button type="submit" name="submit">Confirm</button>
			</form>
		</div>
	</section>
	
<?php
	include_once 'footer.php';
?>