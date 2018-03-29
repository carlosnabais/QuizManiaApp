<?php
  if(isset($_POST['refine'])){
    
    	include ("dbh.inc.php");
    
    $catTitle = mysqli_real_escape_string($conn, $_POST['catName']);
    $level =  mysqli_real_escape_string($conn, $_POST['catLevel']);
    
    if(empty($catTitle) and empty($level)){
      //if both search fields are empty
      Header("Location: ../adminHome.php?refineFields=empty");
      exit();
    }
    else if(empty($catTitle) and !empty($level)){
      //if title field empty but level field is set
      //Populating user drop down select with username array
      $sql = "SELECT * FROM `Categories` WHERE `categoryLevel` = '$level'";
      $query = mysqli_query($conn, $sql);
      while($array[] = $query-> fetch_object());
      array_pop($array);
      Header("Location: ../adminHome.php?refine=level");
      exit();
      
    }
    else if(!empty($catTitle) and empty($level)){
      //if title field is set but level field is empty
      //Populating user drop down select with username array
      $sql = "SELECT * FROM `Categories` WHERE `categoryTitle` = '$catTitle'";
      $query = mysqli_query($conn, $sql);
      while($array[] = $query-> fetch_object());
      array_pop($array);
      Header("Location: ../adminHome.php?refine=title");
      exit();
      
    }
    else if(!empty($catTitle) and !empty($level)){
      //if both fields are set
      //Populating user drop down select with username array
      $sql = "SELECT * FROM `Categories` WHERE `categoryTitle` = '$catTitle' AND `categoryLevel` = '$level'";
      $query = mysqli_query($conn, $sql);
      while($array[] = $query-> fetch_object());
      array_pop($array);
      Header("Location: ../adminHome.php?refine=title&level");
      exit();
    }
  }
  else{
    
    	include ("dbh.inc.php");
    //Populating user drop down select with username array
    $sql = "SELECT * FROM `Categories`";
    $query = mysqli_query($conn, $sql);
    while($array[] = $query-> fetch_object());
    array_pop($array);
  }
