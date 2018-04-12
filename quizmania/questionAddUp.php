<!DOCTYPE html>
<html>
<head>
	<title>QuizMania</title>
	<link rel="stylesheet" type="text/css" href="newStyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>
<section class="hero is-fullheight gradient-background">
<?php
  include 'header.php';
?>

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
        include 'includes/dbh.inc.php';

        $userID = $_POST['uID'];

        $choice1 = $_POST['choice1'];
        $choice2 = $_POST['choice2'];
        $choice3 = $_POST['choice3'];
        // $choice4 = $_POST['choice4'];
        // $choice5 = $_POST['choice5'];

        $qID1 = $_POST['qID1'];
        $qID2 = $_POST['qID2'];
        $qID3 = $_POST['qID3'];
        // $qID4 = $_POST['qID4'];
        // $qID5 = $_POST['qID5'];

        $cID = $_POST['cID'];

        $correctAns1 = $_POST['correctAns1'];
        $correctAns2 = $_POST['correctAns2'];
        $correctAns3 = $_POST['correctAns3'];
        // $correctAns4 = $_POST['correctAns4'];
        // $correctAns5 = $_POST['correctAns5'];

        $sql = "SELECT * FROM results  WHERE results.userID = '$userID' AND results.categoryID = '$cID';";
        mysqli_query($conn, $sql);

        if(!empty($sql)) {
          $sql = "DELETE FROM results WHERE results.userID = '$userID' AND results.categoryID = '$cID';";
          mysqli_query($conn, $sql);
        }

        if($choice1 == $correctAns1) {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID1', '$cID', '$choice1', '$correctAns1', '1')";
          mysqli_query($conn, $query);

        } else {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID1', '$cID', '$choice1', '$correctAns1', '0')";
          mysqli_query($conn, $query);

        }

        if($choice2 == $correctAns2) {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID2', '$cID', '$choice2', '$correctAns2', '1')";
          mysqli_query($conn, $query);

        } else {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID2', '$cID', '$choice2', '$correctAns2', '0')";
          mysqli_query($conn, $query);

        }

        if($choice3 == $correctAns3) {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID3', '$cID', '$choice3', '$correctAns3', '1')";
          mysqli_query($conn, $query);

        } else {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID3', '$cID', '$choice3', '$correctAns3', '0')";
          mysqli_query($conn, $query);

        }

        if($choice4 == $correctAns4) {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID4', '$cID', '$choice4', '$correctAns4', '1')";
          mysqli_query($conn, $query);

        } else {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID4', '$cID', '$choice4', '$correctAns4', '0')";
          mysqli_query($conn, $query);

        }

        if($choice5 == $correctAns5) {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID5', '$cID', '$choice5', '$correctAns5', '1')";
          mysqli_query($conn, $query);

        } else {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID5', '$cID', '$choice5', '$correctAns5', '0')";
          mysqli_query($conn, $query);

        }

        $sql = "SELECT SUM(isCorrect) * 10 AS score FROM `results` WHERE results.userID = $userID AND results.categoryID = $cID ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="hero-body">
                    <div class="container has-text-centered">
                      <p class="title is-size-2 has-text-white">Your final score was:</p>
                      <p class="title is-size-1 has-text-primary">'.$row['score'].'</p>
                    </div>
                  </div>';
          }
        }

    }
?>
<?php
  include 'footer.php';
?>
</section>
</body>
