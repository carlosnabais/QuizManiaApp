<?php

  if(isset($_POST['submit'])){
    
    include ("db.inc.php");
    
    $title = mysqli_real_escape_string($conn, $_POST['catTitle']);
    $level = mysqli_real_escape_string($conn, $_POST['abilityLevel']);
    $date = date("Y-m-d");
    
    if(empty($title)){
      header("Location: ../newCategory.php?title=empty");
		exit();
    }
    else{
      $sql = "INSERT INTO `categories` (`categoryID`,`categoryTitle`,`categoryLevel`,`dateUpdated`) VALUES (NULL, '$title', '$level', '$date')";
      mysqli_query($conn, $sql);
      header("Location: ../newQuestion.php");
      exit();
    }
  }
  else{
    header("Location: ../newCategory.php");
    exit();
  }