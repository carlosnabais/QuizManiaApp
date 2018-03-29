<?php
//Set users as admin
if(isset($_POST['submit'])){
  include ("dbh.inc.php");
  
  $categoryID =  $_POST['categorySelect'];
  
  $sql="DELETE From `categories` Where `categoryID` = '$categoryID';";
  mysqli_query($conn,$sql);
  header("Location: ../index.php");
  exit;
}
else{
  header("Location: ../removeCategory.php");
	exit();
}
?>