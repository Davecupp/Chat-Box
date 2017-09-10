<?php 

include 'database.php';

//check to see if form is submitted.

if (isset($_POST['submit'])) {
	$user =  mysqli_real_escape_string ($con, $_POST['user']);
	$message =  mysqli_real_escape_string ($con, $_POST['message']);

	//sets timezone
	date_default_timezone_set('America/New_York');
	$time= date('h:i:s a', time());

	//validate input

	if(!isset($user) || $user == '' || !isset($message) || $message == ''){
		$error = "Please fill in your name and a message";
		header("Location: index.php?error=".urlencode($error));
		exit();
		} else {
		$query = "INSERT INTO chat (user, message, time)
			VALUES ('$user', '$message', '$time')";

		if(!mysqli_query($con, $query)){
			die('Error: '.mysqli_error($con));
		} else {
			header("Location: index.php");
			exit();
		}
	}
}




?>