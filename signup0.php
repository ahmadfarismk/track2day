<?php
session_start();
	
	include("dbconn.php");
	

	$user_email = $_REQUEST['email'];
	$user_fname = $_REQUEST['fname'];
	$user_lname = $_REQUEST['lname'];
	$user_password = $_REQUEST['password'];
	
	
	$sqlInsert = "INSERT INTO user VALUES
	('" . $user_email . "','" . $user_fname . "',
	 '" . $user_lname . "','" . $user_password . "')";
	 
	 mysqli_query($dbconn, $sqlInsert) or die ("Error: " . mysqli_error($dbconn));
	 echo "The following information have been recorded in the DB";
	 echo "<br>First Name : " .$user_fname;
	 echo "<br>Last Name : " .$user_lname;
	 echo "<br>Email : " .$user_email;
	 echo "<br>Password : " .$user_password;
	echo"<br><a href='viewData.php'>Main page</a>";
?>