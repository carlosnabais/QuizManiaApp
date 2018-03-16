<?php

if(isset($_POST['submit'])){
	session_start();
	//unset all system variables
	session_unset();
	//destroy running sessions
	session_destroy();
	header("Location: ../index.php");
	exit();
}