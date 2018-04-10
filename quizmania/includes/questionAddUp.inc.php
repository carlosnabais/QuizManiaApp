<?php 

    //Check if score is score is set = set_error_handler
    if(!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;  //If score is not set, it is not there, then we crete one ans set to 0
    }

    if($_POST){
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];
        $next = $number+1;

        /* Get total questions */

        $query = "SELECT * FROM questions";
        /* Get results */
        $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $total = $results->num_rows;

        /* Get correct choice */
        $query = "SELECT * FROM options WHERE questionID = $number AND correct_option = 1";
        //Get result
        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
        //Get row
        $row = $result->fetch_assoc();
        //Set correct choice

        $correct_choice = $row['id'];
        //Compare

        if($correct_choice == $selected_choice){
            // Answer is correct
            $_SESSION['score']++;
        }

    // Check if it the last session: In case it is --> Go to the last session

        if($number == $total){
            header("Location: final.php");
            exit();
        }else {
            header("Location: question.php?n=".$next);
        }
    }
    ?>