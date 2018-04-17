<?php

if(isset($_POST['submit'])){

	include ("dbh.inc.php");

	//Prohibit malicious code
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$eml = mysqli_real_escape_string($conn, $_POST['eml']);
	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$psw = mysqli_real_escape_string($conn, $_POST['psw']);

	//Error Handlers
	//Check for empty fields
	if(empty($fname) || empty($lname) || empty($eml) || empty($uname) || empty($psw)){
		header("Location: ../register.php?registration=empty");
		exit();
	}
	else{
		//Check if input characters are valid
		if(!preg_match("/^[a-zA-Z]+$/", $fname) || !preg_match("/^[a-zA-Z]+$/", $lname)){
			header("Location: ../register.php?registration=invalid");
			exit();
		}
		else{
			//check if email is valid
			if(!filter_var($eml, FILTER_VALIDATE_EMAIL)){
				header("Location: ../register.php?registration=email");
				exit();
			}
			else{
				//check if username is taken
				$sql = "SELECT * FROM Users WHERE username='$uname'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck > 0){
					header("Location: ../register.php?registration=userTaken");
					exit();
				}
				else{
					//Hash Password
					$hashedPsw = password_hash($psw, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO `users`(`userID`, `firstName`, `lastName`, `email`, `username`, `users_password`, `adminAccess`) VALUES (NULL,'$fname','$lname','$eml','$uname','$hashedPsw','0')";
					mysqli_query($conn, $sql);
					header("Location: ../index.php?registration=success");
					exit();
				}
			}
		}
	}
}
else{
	header("Location: ../register.php");
	exit();
}
