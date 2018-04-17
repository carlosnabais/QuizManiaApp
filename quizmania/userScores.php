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
  include_once 'header.php';
  include_once 'includes/dbh.inc.php';
?>
<div class="hero-body">
  <div class="container">
<?php

  $user = $_SESSION['uID'];

  $sql = "SELECT categories.categoryTitle, scores.score * 10 AS scores FROM scores
         INNER JOIN categories ON categories.categoryID = scores.categoryID
         WHERE userID = $user";

  $query = mysqli_query($conn, $sql);

  if ($query->num_rows > 0) {

      echo "<p class='title has-text-white is-size-2 has-text-centered is-spaced'>Your Scores</p>
            <div class='at-center'>
            <table class='table at-center'><thead>
            <th class='has-text-centered'>Category Title</th>
            <th class='has-text-centered'>Score</th>
            </thead><tbody>";

      // output data of each row
      while($row = $query->fetch_assoc()) {
          echo "<tr>
                <td class='has-text-centered'>".$row["categoryTitle"]."</td>
                <td class='has-text-centered'>".$row["scores"]."</td>
                </tr>";
      }

      echo "</tbody></table>";

  } else {
      echo "<p class='title has-text-white is-size-2 has-text-centered is-spaced'>No scores found!</p>
            <p class='subtitle has-text-white is-size-3 has-text-centered is-spaced'>
              Oh, it seems like you have not completed a quiz yet!<br/><span class='icon is-large has-text-white'><i class='fas fa-lg fa-meh'></i></span>
            </p>
            <div class='field'>
              <div class='control has-text-centered'>
                <a class='button is-primary is-rounded' href='index.php'>Take me to the quizzes</a>
              </div>
            </div>";
  }
?>
</div>
</div>
</div>
<?php
	include 'footer.php';
?>
</section>
