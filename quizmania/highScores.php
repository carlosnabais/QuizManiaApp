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
    <p class="title has-text-white is-size-2 has-text-centered"><b>QUIZ</b>Mania High Scores</p>
    <div class="at-center"><br/>
    <?php

			$sql1 = "DELETE FROM scores;";
			$query1 = mysqli_query($conn, $sql1);


			$sql2 =    "INSERT INTO scores(userID,categoryID,score)
                SELECT userID, categoryID, SUM(isCorrect)
                FROM results
                GROUP BY userID, categoryID;";
      $query2 = mysqli_query($conn, $sql2);


      $sql3 =   "SELECT users.username, categories.categoryTitle, scores.score * 10 AS scores FROM scores
                INNER JOIN users ON users.userID = scores.userID
                INNER JOIN categories ON categories.categoryID = scores.categoryID
                WHERE users.adminAccess = 0
                ORDER BY scores DESC;";
      $query3 = mysqli_query($conn, $sql3);

      if ($query3->num_rows > 0) {

          echo "<table class='table is-bordered at-center'><thead>
                <tr><th class='has-text-centered title is-6'>USERNAME</th>
                <th class='has-text-centered title is-6'>CATEGORY TITLE</th>
                <th class='has-text-centered title is-6'>SCORE</th>
                </thead>";

          // output data of each row
          while($row = $query3->fetch_assoc()) {
              echo "<tbody><tr>
                    <td class='has-text-centered'>".$row["username"]."</td>
                    <td class='has-text-centered'>".$row["categoryTitle"]."</td>
                    <td class='has-text-centered'>".$row["scores"]."</td>
                    </tr></tbody>";
          }

          echo "</table>";

      } else {
          echo "0 results";
      }

    ?>
    </div>
  </div>
</div>
</section>
