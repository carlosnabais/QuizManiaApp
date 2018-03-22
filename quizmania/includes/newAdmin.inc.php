<?php
//Set users as admin
if(isset($_POST['submit'])){
  include ("dbh.inc.php");
  
  $uID =  $_POST['usernameSelect'];
  
  $sql="UPDATE `users` SET `adminAccess` = 1 WHERE `userID` = '$uID';";
  mysqli_query($conn,$sql);
  header("Location: ../index.php");
  exit;
}
else{
  header("Location: ../newAdmin.php");
	exit();
}