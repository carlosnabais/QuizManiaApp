<?php
	include_once 'header.php';
?>
	<section class="main-container">
		<div class="main-wrapper">
			<h2>Welcome</h2>
			<?php
				if(isset($_SESSION['uID'])){
					echo "You are logged in";
				}
			?>
		</div>
	</section>
	
<?php
	include_once 'footer.php';
?>
