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
    include_once 'includes/refineQuestionOutput.inc.php';
?>

            <?php
            if(isset($_SESSION['uID'])){
              $userID = $_SESSION['uID'];

              // will allow to count each time the loop runs and change names of variables
              $i = 1;

              //this is what is diplayed to the signed in users
              echo '<div class="hero-body">';

              echo '<div class="container has-text-centered">';
              echo '<form method="post" action ="questionAddUp.php">';

            foreach($array as $questFull) :
              echo    '</br>';
              echo    '<div class="container">';
              echo    '<div class="box limit-width at-center"><ul>';
              echo    '<li><b>Question: </b><br/>';
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
              endforeach;
              echo    '<br/><button class="button is-danger is-rounded" name="submit">Submit</button></form></div></div>';

            }

            else{
              echo '<div class="hero-body"><div class="container has-text-left">';
              echo '<p class="has-text-white is-size-1 title is-spaced">Welcome to <b>QUIZ</b>Mania</p>';
              echo '</div></div>';
            }
            ?>


<?php
    include_once 'footer.php';
?>
</section>
</body>
