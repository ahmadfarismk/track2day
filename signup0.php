<?php
	
	include("dbconn.php");
	

	$u_email = $_REQUEST['email'];
	$u_fname = $_REQUEST['fname'];
	$u_lname = $_REQUEST['lname'];
	$u_password = $_REQUEST['password'];
	
	
	$sqlInsert = "INSERT INTO user VALUES
	('" . $u_email . "','" . $u_fname . "',
	 '" . $u_lname . "','" . $u_password . "')";
	 
	 mysqli_query($dbconn, $sqlInsert) or die ("Error: " . mysqli_error($dbconn));
	 echo "The following information have been recorded in the DB";
	 echo "<br>First Name : " .$u_fname;
	 echo "<br>Last Name : " .$u_lname;
	 echo "<br>Email : " .$u_email;
	 echo "<br>Password : " .$u_password;
	echo"<br><a href='viewData.php'>Main page</a>";
?>