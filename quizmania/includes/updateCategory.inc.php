<?php

if (isset($_POST['update'])){
  include ("dbh.inc.php");
  $categoryID = mysqli_real_escape_string($conn,$_POST['categoryID']);
  $questionID = mysqli_real_escape_string($conn,$_POST['questionID']);
  
  $questionOutput = mysqli_real_escape_string($conn,$_POST['qText']);
  $questionHint = mysqli_real_escape_string($conn,$_POST['qHint']);
  
  $optionOne = mysqli_real_escape_string($conn,$_POST['InputAnsOne']);
  $optionTwo = mysqli_real_escape_string($conn,$_POST['InputAnsTwo']);
  $optionThree = mysqli_real_escape_string($conn,$_POST['InputAnsThree']);
  $optionFour = mysqli_real_escape_string($conn,$_POST['InputAnsFour']);
  
  $correctOption =  $_POST['correctAnswer'];
  
  if(empty($questionOutput) || empty($optionOne) || empty($optionTwo) || empty($optionThree) || empty($optionFour)){
      header("Location: ../editCategory.php?Input=empty");
      exit();
    }
    else{
      //Check if input characters are valid
      if(!preg_match("/^[a-zA-Z0-9 \s]+$/", $optionOne) || !preg_match("/^[a-zA-Z0-9 \s]+$/", $optionTwo)
        || !preg_match("/^[a-zA-Z0-9 \s]+$/", $optionThree) || !preg_match("/^[a-zA-Z0-9 \s]+$/", $optionFour)){
        header("Location: ../editCategory.php?input=invalid");
        exit();
      }
      else{
        
                $sqlQ="UPDATE `questions`
            SET `questionOutput`= '$questionOutput',
             `questionHint`= '$questionHint'
            WHERE questionID=$questionID;"; 
            
        mysqli_query($conn, $sqlQ);
        
        if($correctOption == 1){
           $sqlO="UPDATE options
          SET option_one='$optionOne',
          option_two='$optionTwo',
          option_three='$optionThree',
          option_four='$optionFour',
          correct_option='$optionOne'
          WHERE questionID='$questionID';";
          mysqli_query ($conn, $sqlO);
          header("Location: ../editCategory.php?category=".$categoryID);
          exit();
        }
        elseif($correctOption == 2){
           $sqlO="UPDATE options
          SET option_one='$optionOne',
          option_two='$optionTwo',
          option_three='$optionThree',
          option_four='$optionFour',
          correct_option='$optionTwo'
          WHERE questionID='$questionID';";
          mysqli_query ($conn, $sqlO);
          header("Location: ../editCategory.php?category=".$categoryID);
          exit();
        }
        elseif($correctOption == 3){
           $sqlO="UPDATE options
          SET option_one='$optionOne',
          option_two='$optionTwo',
          option_three='$optionThree',
          option_four='$optionFour',
          correct_option='$optionThree'
          WHERE questionID='$questionID';";
          mysqli_query ($conn, $sqlO);
          header("Location: ../editCategory.php?category=".$categoryID);
          exit();
        }
        elseif($correctOption ==4 ){
           $sqlO="UPDATE options
          SET option_one='$optionOne',
          option_two='$optionTwo',
          option_three='$optionThree',
          option_four='$optionFour',
          correct_option='$optionFour'
          WHERE questionID='$questionID';";
          mysqli_query ($conn, $sqlO);
          header("Location: ../editCategory.php?category=".$categoryID);
          exit();
        }
      }
    }

}elseif(isset($_POST['remove'])){
   include ("dbh.inc.php");
  $questionID = mysqli_real_escape_string($conn,$_POST['questionID']);
  
  $sql="DELETE From `options` Where `questionID` = '$questionID';";
  mysqli_query($conn, $sql);
  
  $sqlq="DELETE From `questions` Where `questionID` = '$questionID';";
  mysqli_query($conn, $sqlq);
  
}
else{
  header("Location: ../index.php");
  exit();
}