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
        $cID = $_POST['cID'];
        $sql = "SELECT * FROM results  WHERE results.userID = '$userID' AND results.categoryID = '$cID';";
				mysqli_query($conn, $sql);

				if(!empty($sql)) {
          $sql = "DELETE FROM results WHERE results.userID = '$userID' AND results.categoryID = '$cID';";
          mysqli_query($conn, $sql);
        }
				for($i = 1; $i < 11; $i++) {
					$choice = $_POST['choice' . $i];
					$qID = $_POST['qID' . $i];
					$correctAns = $_POST['correctAns' . $i];
					if($choice == $correctAns) {
	          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID', '$cID', '$choice', '$correctAns', '1')";
	          mysqli_query($conn, $query);
	        } else {
	          $query = "INSERT INTO `results` (`userID`, `questionID`, `categoryID`, `option_chosen`, `correct_option`, `isCorrect`) VALUES ('$userID', '$qID', '$cID', '$choice', '$correctAns', '0')";
	          mysqli_query($conn, $query);
	        }
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
				$sql1 = "DELETE FROM scores;";
				$query1 = mysqli_query($conn, $sql1);
				$sql2 =   "INSERT INTO scores(userID,categoryID,score)
	                SELECT userID, categoryID, SUM(isCorrect)
	                FROM results
	                GROUP BY userID, categoryID;";
	      $query2 = mysqli_query($conn, $sql2);
    }
?>
<?php
  include 'footer.php';
?>
</section>
</body>
