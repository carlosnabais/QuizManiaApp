<?php
//Set users as admin
if(isset($_POST['update'])){
   include ("dbh.inc.php");
   
  $categoryID = mysqli_real_escape_string($conn, $_POST['categorySelect']);
  $categoryTitle = mysqli_real_escape_string($conn, $_POST['categoryTitle']);
  $categoryLevel = mysqli_real_escape_string($conn, $_POST['abilityLevel']);
  $date = date("Y-m-d");
  if(empty($categoryTitle)|| empty($categoryLevel)){
    header("Location: ../editCategory.php?Field=empty");
      exit();
  }
  else{
    $categoryTitle =trim($categoryTitle);
    
    if(!preg_match("/^[a-zA-Z0-9 \s]+$/", $categoryTitle)){
      header("Location: ../editCategory.php?categoryTitle=invalid");
        exit();
    }
    //check if category title already exists
     $sql = "SELECT * FROM Categories WHERE categoryTitle='$title'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if($resultCheck > 0){
            header("Location: ../editCategory.php?categoryTitle=titleTaken");
            exit();
          }
          else{
            //Insert the category into the database
            $sql = "UPDATE `categories` SET `categoryTitle`='$categoryTitle',`categoryLevel`='$categoryLevel',`dateUpdated`='$date' WHERE `categoryID`='$categoryID'" ;
            mysqli_query($conn, $sql);
            header("Location: ../editCategory.php?category=".$categoryID);
            exit();
          }
  }
  
  
}
elseif(isset($_POST['remove'])){
  include ("dbh.inc.php");
  
  $categoryID =  $_POST['categorySelect'];
  
  $sql="DELETE From `categories` Where `categoryID` = '$categoryID';";
  mysqli_query($conn,$sql);
  header("Location: ../index.php?removal=success");
  exit;
}
else{
  header("Location: ../index.php");
	exit();
}
?>