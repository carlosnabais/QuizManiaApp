<?php 
 
if(isset($_POST['category_id'])){
	$number = (int) $_GET['n'];
    $quesID = mysqli_real_escape_string($conn, $_POST['category_id']);

    $sql = "SELECT * FROM `questions`, `options`WHERE '$quesID'=questions.categoryID AND questions.questionID = options.questionID ORDER BY RAND() LIMIT 0,1";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_fetch_assoc($result);

}    

?>