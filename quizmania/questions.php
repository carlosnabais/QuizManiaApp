<!DOCTYPE html>
<html>
<head>
    <title>QuizMania</title>
    <link rel="stylesheet" type="text/css" href="newStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script type="text/javascript" src="scripts/timer.js"></script>
</head>
<body onload="countdown()">
<section class="hero is-fullheight gradient-background">
<?php
    include_once 'header.php';
    include_once 'includes/dbh.inc.php';
    include_once 'includes/refineQuestionOutput.inc.php';
?>
<?php
header("Refresh: 600; url=failedToComplete.php");
if(isset($_SESSION['uID'])) {
  $userID = $_SESSION['uID'];
  $category = $_POST['category_id'];
  // will allow to count each time the loop runs and change names of variables
  $i = 1;

  $sql = "SELECT categoryTitle FROM categories WHERE categoryID = '$category'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo '<div class="hero-body">
              <div class="container has-text-centered">
                <p class="title has-text-white is-size-2 has-text-centered is-spaced"><b class="has-text-warning">'.$row['categoryTitle'].'</b> Quiz</p>
                  <form method="post" action ="questionAddUp.php">';
    }
  }

foreach($array as $questFull) {
  echo    '</br>';
  echo    '<div class="container">';
  echo    '<div class="box limit-width at-center"><ul>';
  echo    '<li><b>Question '.$i.': </b><br/>';
  echo    '<input type="hidden" value="'.$questFull->questionID.'" name="qID'.$i.'">';
  echo    '<input type="hidden" value="'.$questFull->categoryID.'" name="cID">';
  echo    '<input type="hidden" value="'.$questFull->correct_option.'" name="correctAns'.$i.'">';
  echo    '<p>'.$questFull->questionOutput.'</p>';
  echo    '<input type="hidden" name="uID" value="'.$userID.'"/>';
  echo    '<li><b>A: </b><input name="choice'.$i.'" type="radio" value="'.$questFull->option_one.'" /> '.$questFull->option_one.' </li>';
  echo    '<li><b>B: </b><input name="choice'.$i.'" type="radio" value="'.$questFull->option_two.'" /> '.$questFull->option_two.' </li>';
  echo    '<li><b>C: </b><input name="choice'.$i.'" type="radio" value="'.$questFull->option_three.'" /> '.$questFull->option_three.' </li>';
  echo    '<li><b>D: </b><input name="choice'.$i.'" type="radio" value="'.$questFull->option_four.'" /> '.$questFull->option_four.' </li>';
  echo    '</br></ul></div></div>';
  $i++;
  if($i == 11) break;
}
  echo    '<br/><button class="button is-danger is-rounded" name="submit">Submit</button></form></div></div><br/><br/><br/>';
}
// else{
//   echo '<div class="hero-body"><div class="container has-text-left">';
//   echo '<p class="has-text-white is-size-1 title is-spaced">Welcome to <b>QUIZ</b>Mania</p>';
//   echo '</div></div>';
// }
?>
<div class="fixed-foot hero-foot">
  <div class="container">
  <div class="level">
    <div class="level-item">
      <div class="has-text-centered">
        <br/>
        <p class="title is-size-5 has-text-white">TIME LEFT</p>
        <div class="has-text-warning is-size-3 has-text-centered" id="countdown"></div>
      </div>
    </div>
  </div>
</div>
</div>
</section>
</body>
</html>
