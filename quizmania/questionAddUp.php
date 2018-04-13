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

    if(isset($_POST['submit'])) {
        include 'includes/dbh.inc.php';

        $userID = $_POST['uID'];

        $choice1 = $_POST['choice1'];
        $choice2 = $_POST['choice2'];
        $choice3 = $_POST['choice3'];
        $choice4 = $_POST['choice4'];
        $choice5 = $_POST['choice5'];
				$choice6 = $_POST['choice6'];
				$choice7 = $_POST['choice7'];
				$choice8 = $_POST['choice8'];
				$choice9 = $_POST['choice9'];
				$choice10 = $_POST['choice10'];

        $qID1 = $_POST['qID1'];
        $qID2 = $_POST['qID2'];
        $qID3 = $_POST['qID3'];
        $qID4 = $_POST['qID4'];
        $qID5 = $_POST['qID5'];
				$qID6 = $_POST['qID6'];
				$qID7 = $_POST['qID7'];
				$qID8 = $_POST['qID8'];
				$qID9 = $_POST['qID9'];
				$qID10 = $_POST['qID10'];

        $cID = $_POST['cID'];

        $correctAns1 = $_POST['correctAns1'];
        $correctAns2 = $_POST['correctAns2'];
        $correctAns3 = $_POST['correctAns3'];
        $correctAns4 = $_POST['correctAns4'];
        $correctAns5 = $_POST['correctAns5'];
				$correctAns6 = $_POST['correctAns6'];
				$correctAns7 = $_POST['correctAns7'];
				$correctAns8 = $_POST['correctAns8'];
				$correctAns9 = $_POST['correctAns9'];
				$correctAns10 = $_POST['correctAns10'];

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

				if($choice6 == $correctAns6) {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID6', '$cID', '$choice6', '$correctAns6', '1')";
          mysqli_query($conn, $query);

        } else {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID6', '$cID', '$choice6', '$correctAns6', '0')";
          mysqli_query($conn, $query);

        }

				if($choice7 == $correctAns7) {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID7', '$cID', '$choice7', '$correctAns7', '1')";
          mysqli_query($conn, $query);

        } else {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID7', '$cID', '$choice7', '$correctAns7', '0')";
          mysqli_query($conn, $query);

        }

				if($choice8 == $correctAns8) {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID8', '$cID', '$choice8', '$correctAns8', '1')";
          mysqli_query($conn, $query);

        } else {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID8', '$cID', '$choice8', '$correctAns8', '0')";
          mysqli_query($conn, $query);

        }

				if($choice9 == $correctAns9) {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID9', '$cID', '$choice9', '$correctAns9', '1')";
          mysqli_query($conn, $query);

        } else {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID9', '$cID', '$choice9', '$correctAns9', '0')";
          mysqli_query($conn, $query);

        }

				if($choice10 == $correctAns10) {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID10', '$cID', '$choice10', '$correctAns10', '1')";
          mysqli_query($conn, $query);

        } else {
          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID10', '$cID', '$choice10', '$correctAns10', '0')";
          mysqli_query($conn, $query);

        }

				// Display scores after quiz
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
