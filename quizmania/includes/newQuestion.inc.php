<?php

  if(isset($_POST['next']) || isset($_POST['finish'])){
	include ("dbh.inc.php");
	
	//Prohibit malicious code
    $catID =  $_POST['chosenID'];
    $qText =  mysqli_real_escape_string($conn, $_POST['qText']);
    $qHint = mysqli_real_escape_string($conn, $_POST['qHint']);
    $ansOne = mysqli_real_escape_string($conn, $_POST['InputAnsOne']);
    $ansTwo = mysqli_real_escape_string($conn, $_POST['InputAnsTwo']);
    $ansThree = mysqli_real_escape_string($conn, $_POST['InputAnsThree']);
    $ansFour = mysqli_real_escape_string($conn, $_POST['InputAnsFour']);
    $correctAns = $_POST['correctAnswer'];
    
    //Check for empty fields
    if(empty($qText) || empty($ansOne) || empty($ansTwo) || empty($ansThree) || empty($ansFour)){
      header("Location: ../newQuestion.php?Input=empty");
      exit();
    }
    else{
      //Check if input characters are valid
      if(!preg_match("/^[a-zA-Z0-9 \s]+$/", $ansOne) || !preg_match("/^[a-zA-Z0-9 \s]+$/", $ansTwo) 
        || !preg_match("/^[a-zA-Z0-9 \s]+$/", $ansThree) || !preg_match("/^[a-zA-Z0-9 \s]+$/", $ansFour)){
        header("Location: ../newQuestion.php?input=invalid");
        exit();
      }
      else{
        //Insert the question into a row of the database
        $sql = "INSERT INTO `questions`(`questionID`, `categoryID`, `questionOutput`, `questionHint`) VALUES (NULL, '$catID', '$qText', '$qHint')";
        mysqli_query($conn, $sql);
        
        /*//store the ID of the question for using with the answers
        $sql = "SELECT `questionID` FROM `questions` WHERE `questionOutput` = '$qText';";
        $qID = mysqli_query($conn, $sql);*/
        
        if($correctAns == 1){
          //Insert answers 
          $sql = "INSERT INTO `options`(`optionID`, `questionID`, `option_one`, `option_two`, `option_three`, `option_four`, `correct_option`) VALUES 
          (NULL, '$result', '$ansOne', '$ansTwo', '$ansThree', '$ansFour', '$ansOne')";
          mysqli_query($conn, $sql);
          //does the admin wish to continue adding questions?
          if(isset($_POST['next'])){ //yes
            header("Location: ../newQuestion.php?question=success");
            exit();
          }
          else if(isset($_POST['finish'])){ //no
            header("Location: ../index.php?question=success");
            exit();
          }
        }
        else if($correctAns == 2){
          //Insert answers 
          $sql = "INSERT INTO `options`(`optionID`, `questionID`, `option_one`, `option_two`, `option_three`, `option_four`, `correct_option`) VALUES 
         (NULL, '$qID', '$ansOne', '$ansTwo', '$ansThree', '$ansFour', '$ansTwo')";
          mysqli_query($conn, $sql);
          //does the admin wish to continue adding questions?
          if(isset($_POST['next'])){ //yes
            header("Location: ../newQuestion.php?questionTwo=success");
            exit();
          }
          else if(isset($_POST['finish'])){ //no
            header("Location: ../index.php?question=success");
            exit();
          }
        }
        else if($correctAns == 3){
          //Insert answers 
          $sql = "INSERT INTO `options`(`optionID`, `questionID`, `option_one`, `option_two`, `option_three`, `option_four`, `correct_option`) VALUES 
          ((NULL, '$qID', '$ansOne', '$ansTwo', '$ansThree', '$ansFour', '$ansThree')";
          mysqli_query($conn, $sql);
          //does the admin wish to continue adding questions?
          if(isset($_POST['next'])){ //yes
            header("Location: ../newQuestion.php?question=success");
            exit();
          }
          else if(isset($_POST['finish'])){ //no
            header("Location: ../index.php?question=success");
            exit();
          }
        }
        else if($correctAns == 4){
          //Insert answers 
          $sql = "INSERT INTO `options`(`optionID`, `questionID`, `option_one`, `option_two`, `option_three`, `option_four`, `correct_option`) VALUES 
          (NULL, '$qID', '$ansOne', '$ansTwo', '$ansThree', '$ansFour', '$ansThree')";
          mysqli_query($conn, $sql);
          //does the admin wish to continue adding questions?
          if(isset($_POST['next'])){ //yes
            header("Location: ../newQuestion.php?question=success");
            exit();
          }
          else if(isset($_POST['finish'])){ //no
            header("Location: ../index.php?question=success");
            exit();
          }
        }
      }
    }
  }
  else{
    header("Location: ../newQuestion.php");
    exit();
  }