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
                    //this is what is diplayed to the signed in users
            echo '<div class="hero-body">';

            echo '<div class="container has-text-centered">';

            echo '<div class="container has-text-centered">';

                    echo '</br>';
                    echo '<div class="container">';
                    echo    '<div class="box limit-width at-center"><ul>';
                    echo    '<li><b>Question: </b>';  

                    echo    '<form method="post" action ="includes/questionAddUp.inc.php">';
                    echo    $resultCheck['questionOutput'];            
                    echo    '<li><b>A: </b><input name="choice" type="radio" value="'.$resultCheck['option_one'].'" />'.$resultCheck['option_one'].' </li>';
                    echo    '<li><b>B: </b><input name="choice" type="radio" value="'.$resultCheck['option_two'].'" />'.$resultCheck['option_two'].' </li>';     
                    echo    '<li><b>C: </b><input name="choice" type="radio" value="'.$resultCheck['option_three'].'" />'.$resultCheck['option_three'].' </li>';
                    echo    '<li><b>D: </b><input name="choice" type="radio" value="'.$resultCheck['option_four'].'" />'.$resultCheck['option_four'].' </li>';
                    echo    '<input type="submit" value="Submit"/>';
                    echo    '<input type = "hidden" name = "number" value ="'.$number.'" />';
                    echo    '</li>';
                    echo    '</br>';
                    echo    '<button class="button is-danger is-rounded" class="startquiz">Next Question</button>';
                    echo    '</form>';
                    echo    '</ul></div>';
                    echo '</div></div>';


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