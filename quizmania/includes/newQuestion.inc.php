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
      if(!preg_match("/^[a-zA-Z]*$/", $ansOne) || 
      !preg_match("/^[a-zA-Z]*$/", $ansTwo) || !preg_match("/^[a-zA-Z]*$/", $ansThree) || !preg_match("/^[a-zA-Z]*$/", $ansFour)){
        header("Location: ../newQuestion.php?input=invalid");
        exit();
      }
      else{
        //Insert the question into a row of the database
        $sql = "INSERT INTO `questions`(`questionID`, `categoryID`, `questionOutput`, `questionHint`) VALUES (NULL, '$catID', '$qText', '$qHint')";
        mysqli_query($conn, $sql);
        
        //store the ID of the question for using with the answers
        $sql = "SELECT `questionID` FROM `questions` WHERE `questionOutput` = '$qText';";
        $questionID = mysqli_query($conn, $sql);
        
        if($correctAns == 1){
          //Insert answers into rows of their own
          $sql = "INSERT INTO `answers`(`answerID`, `questionID`, `answerOutput`, `correct`) VALUES 
          (NULL, '$questioinID', '$ansOne', '1'),
          (NULL, '$questioinID', '$ansTwo', '0'), 
          (NULL, '$questioinID', '$ansThree', '0'), 
          (NULL, '$questioinID', '$ansFour', '0');";
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
          //Insert answers into rows of their own
          $sql = "INSERT INTO `answers`(`answerID`, `questionID`, `answerOutput`, `correct`) VALUES 
          (NULL, '$questioinID', '$ansOne', '0'),
          (NULL, '$questioinID', '$ansTwo', '1'), 
          (NULL, '$questioinID', '$ansThree', '0'), 
          (NULL, '$questioinID', '$ansFour', '0');";
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
          //Insert answers into rows of their own
          $sql = "INSERT INTO `answers`(`answerID`, `questionID`, `answerOutput`, `correct`) VALUES 
          (NULL, '$questioinID', $ansOne, '0'),
          (NULL, '$questioinID', $ansTwo, '0'), 
          (NULL, '$questioinID', $ansThree, '1'), 
          (NULL, '$questioinID', $ansFour, '0');";
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
          //Insert answers into rows of their own
          $sql = "INSERT INTO `answers`(`answerID`, `questionID`, `answerOutput`, `correct`) VALUES 
          (NULL, '$questioinID', $ansOne, '0'),
          (NULL, '$questioinID', $ansTwo, '0'), 
          (NULL, '$questioinID', $ansThree, '0'), 
          (NULL, '$questioinID', $ansFour, '1');";
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