<?php

    // //Check if score is score is set = set_error_handler
    // if(!isset($_SESSION['score'])){
    //     $_SESSION['score'] = 0;  //If score is not set, it is not there, then we crete one ans set to 0
    // }
    //
    // if($_POST){
    //     // $number = $_POST['number'];
    //     $selected_choice = $_POST['choice'];
    //     $next = $number+1;
    //     $category = $_POST['categoryid'];
    //
    //     /* Get total questions */
    //
    //     $query = "SELECT * FROM questions WHERE categoryID = $category AND questionID != ";
    //     /* Get results */
    //     $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    //     $total = $results->num_rows;
    //
    //     /* Get correct choice */
    //     $query = "SELECT * FROM options WHERE questionID = $number AND correct_option = 1";
    //     //Get result
    //     $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    //     //Get row
    //     $row = $result->fetch_assoc();
    //     //Set correct choice
    //
    //     $correct_choice = $row['id'];
    //     //Compare
    //
    //     if($correct_choice == $selected_choice){
    //         // Answer is correct
    //         $_SESSION['score']++;
    //     }
    //
    // // Check if it the last session: In case it is --> Go to the last session
    //
    //     if($number == $total){
    //         header("Location: final.php");
    //         exit();
    //     }else {
    //         header("Location: question.php?n=".$next);
    //     }
    // }

    if(isset($_POST['submit'])) {
        include 'dbh.inc.php';

        $userID = $_POST['uID'];

        $choice1 = $_POST['choice1'];
        $choice2 = $_POST['choice2'];
        $choice3 = $_POST['choice3'];

        $qID1 = $_POST['qID1'];
        $qID2 = $_POST['qID2'];
        $qID3 = $_POST['qID3'];

        $cID1 = $_POST['cID1'];
        $cID2 = $_POST['cID2'];
        $cID3 = $_POST['cID3'];
        
        $correctAns1 = $_POST['correctAns1'];
        $correctAns2 = $_POST['correctAns2'];
        $correctAns3 = $_POST['correctAns3'];


        if($choice1 == $correctAns1) {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID1', '$cID1', '$choice1', '$correctAns1', '1')";
          mysqli_query($conn, $query);

        } else {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID1', '$cID1', '$choice1', '$correctAns1', '0')";
          mysqli_query($conn, $query);

        }

        if($choice2 == $correctAns2) {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID2', '$cID2', '$choice2', '$correctAns2', '1')";
          mysqli_query($conn, $query);

        } else {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID2', '$cID2', '$choice2', '$correctAns2', '0')";
          mysqli_query($conn, $query);

        }

        if($choice3 == $correctAns3) {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID3', '$cID3', '$choice3', '$correctAns3', '1')";
          mysqli_query($conn, $query);

        } else {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID3', '$cID3', '$choice3', '$correctAns3', '0')";
          mysqli_query($conn, $query);

        }

    }

    ?>
