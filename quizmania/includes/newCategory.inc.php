<?php

  if(isset($_POST['submit'])){

	include ("dbh.inc.php");

	//Prohibit malicious code
    $title = mysqli_real_escape_string($conn, $_POST['catTitle']);
    $level =  mysqli_real_escape_string($conn, $_POST['abilityLevel']);
    $date = date("Y-m-d");

    //Check for empty fields
    if(empty($title) || empty($level)){
      header("Location: ../newCategory.php?title=empty");
      exit();
    }
    else{
      //Remove any accidental spaces
      $title =trim($title);
      //Check if input characters are valid
      if(!preg_match("/^[a-zA-Z0-9 \s]+$/", $title)){
        header("Location: ../newCategory.php?title=invalid");
        exit();
      }
      else{
          //check if title is taken
          $sql = "SELECT * FROM Categories WHERE categoryTitle='$title'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if($resultCheck > 0){
            header("Location: ../newCategory.php?title=titleTaken");
            exit();
          }
          else{
            //Insert the category into the database
            $sql = "INSERT INTO `categories` (`categoryID`,`categoryTitle`,`categoryLevel`,`dateUpdated`) VALUES (NULL, '$title', '$level', '$date')";
            mysqli_query($conn, $sql);
            header("Location: ../newQuestion.php?category=success");
            exit();
          }
      }
    }
  }
  else{
    header("Location: ../newCategory.php");
    exit();
  }
