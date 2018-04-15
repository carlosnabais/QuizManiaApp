<!DOCTYPE html>
<html>
<head>
	<title>QuizMania</title>
	<link rel="stylesheet" type="text/css" href="newStyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body onload="start()">
<section class="hero is-fullheight gradient-background">
<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<div class="hero-body">
  <div class="container">
    <?php

      $sql =   "SELECT users.username, categories.categoryTitle, scores.score * 10 AS scores FROM scores
                INNER JOIN users ON users.userID = scores.userID
                INNER JOIN categories ON categories.categoryID = scores.categoryID
                WHERE users.adminAccess = 0
                ORDER BY scores DESC;";
      $query = mysqli_query($conn, $sql);

      if ($query->num_rows > 0) {

          echo "<p class='title has-text-white is-size-2 has-text-centered is-spaced'><b>QUIZ</b>Mania High Scores</p>
			    			<div class='at-center'>
								<table class='table at-center'><thead>
                <tr><th class='has-text-centered'>Username</th>
                <th class='has-text-centered'>Category Title</th>
                <th class='has-text-centered'>Score</th>
                </thead>";

					$i = 1;
          // output data of each row
          while($row = $query->fetch_assoc()) {

							if($i == 1) {
								echo "<tbody><tr>
											<td class='has-text-centered'>".$row["username"]."<span class='icon has-text-warning'><i class='fas fa-trophy'></i></span></td>
											<td class='has-text-centered'>".$row["categoryTitle"]."</td>
											<td class='has-text-centered'>".$row["scores"]."</td>
											</tr>";
							}	else {
								echo "<tr>
											<td class='has-text-centered'>".$row["username"]."</td>
											<td class='has-text-centered'>".$row["categoryTitle"]."</td>
											<td class='has-text-centered'>".$row["scores"]."</td>
											</tr>";
							}
							$i++;
          }

          echo "</tbody></table>";

      } else {
          echo "<p class='title has-text-white is-size-2 has-text-centered is-spaced'>Anyone there?</p>
		            <p class='subtitle has-text-white is-size-3 has-text-centered is-spaced'>
		              It seems like you are the first person here! Hurry champ, be the first to take on a quiz.<br/><span class='icon is-large has-text-warning'><i class='fas fa-lg fa-trophy'></i></span>
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
</section>
