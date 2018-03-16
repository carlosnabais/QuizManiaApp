<?php

session_start();

if(isset($_POST['submit'])){
	
	include ("dbh.inc.php");
	
	$userInput = mysqli_real_escape_string($conn, $_POST['userInput']);
	$passInput = mysqli_real_escape_string($conn, $_POST['passInput']);
	
	//Error Handlers
	//Check if empty
	if(empty($userInput) || empty($passInput)){
		header("Location: ../index.php?login=empty");
		exit();
	}
	else{
		$sql="SELECT * FROM `Users` WHERE username='$userInput' OR email='$userInput'";
		$result=mysqli_query($conn, $sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck < 1){
			header("Location: ../index.php?login=error");
			exit();
		}
		else{
			if($row = mysqli_fetch_assoc($result)){
				//Un-hash password
				$hashedPswCheck = password_verify($passInput, $row['users_password']);
				if($hashedPswCheck == false){
					header("Location: ../index.php?login=error");
					exit();
				}
				else if($hashedPswCheck == true){
					if($row['adminAccess'] == '0'){
					//Log in the User here
					$_SESSION['uID']=$row['userID'];
					$_SESSION['fName']=$row['firstName'];
					$_SESSION['lName']=$row['lastName'];
					$_SESSION['eMail']=$row['email'];
					$_SESSION['userName']=$row['username'];
					header("Location: ../index.php?login=success_type=user");
					exit();
					}
					else if($row['adminAccess'] == '1'){
						$_SESSION['uID']=$row['userID'];
						$_SESSION['fName']=$row['firstName'];
						$_SESSION['lName']=$row['lastName'];
						$_SESSION['eMail']=$row['email'];
						$_SESSION['userName']=$row['username'];
						header("Location: ../index.php?login=success_type=admin");
						exit();
					}
				}
			}
		}
	}	
}
else{
		header("Location: ../index.php?login=error");
		exit();
	}